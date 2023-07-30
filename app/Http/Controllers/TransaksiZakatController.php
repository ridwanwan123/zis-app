<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;
use App\Models\Zakat;
use Twilio\Rest\Client;
use App\Models\PenyaluranDana;

use Illuminate\Support\Str;

class TransaksiZakatController extends Controller
{
    public function createZakat()
    {
        $mosques = Mosque::all();
        return view('transaksi.zakat', ['mosques' => $mosques]);
    }

    public function storeZakat(Request $request)
    {
        $validateData = $request->validate([
            'id_mosque' => 'required',
            'jenis_zakat' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominal' => 'required',
        ], [
            'id_mosque.required' => 'Pilih masjid terlebih dahulu.',
            'jenis_zakat.required' => 'Jenis zakat harus diisi.',
            'nama_donatur.required' => 'Nama donatur harus diisi.',
            'phone.required' => 'Nomor telepon harus diisi.',
            'nominal.required' => 'Nominal harus diisi.',
        ]);

        $validateData['status'] = 'Belum Bayar';
        
        // Simpan data zakat ke dalam tabel zakats
        $orderItem = Zakat::create($validateData);

        $this->updateTotalZakat($request->id_mosque);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $zakatId = $orderItem->id;
        $params = [
            'transaction_details' => [
                'order_id' => 'Zakat-' . $zakatId,
                'gross_amount' => $orderItem->nominal,
            ],
            'customer_details' => [
                'name' => $orderItem->nama_donatur,
                'phone' => $orderItem->phone,
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('transaksi.pembayaran', compact('snapToken', 'orderItem'));
    }


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $expectedSignatureKey = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($expectedSignatureKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 400);
        }

        if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
            $order_id = strtolower($request->order_id);
            if (strpos($order_id, 'zakat-') !== 0) {
                return response()->json(['message' => 'Invalid order id'], 400);
            }
            $zakat_id = substr($order_id, strlen('zakat-'));
            $zakat = Zakat::find($zakat_id);

            if (!$zakat) {
                return response()->json(['message' => 'Record Zakat tidak ditemukan'], 404);
            }
            $zakat->update(['status' => 'Bayar']);

            // Update totalZakat pada entitas Mosque
            $this->updateTotalZakat($zakat->id_mosque);
            
            // Send WhatsApp notification
            $this->whatsappNotification($zakat->phone, $zakat->nama_donatur);
        }
    }

    public function invoice(){
        return view('transaksi.success');
    }


    public function whatsappNotification(string $recipient, string $namaDonatur)
    {
        $sid    = getenv("TWILIO_AUTH_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from= getenv("TWILIO_WHATSAPP_FROM");

        $twilio = new Client($sid, $token);

        $body = "Halo $namaDonatur, Pembayaran Zakat Anda telah berhasil. Terima kasih atas kontribusinya.";

        return $twilio->messages->create("whatsapp:$recipient",["from" => "whatsapp:$wa_from", "body" => $body]);
    }

    private function updateTotalZakat($mosqueId)
    {
        $mosque = Mosque::find($mosqueId);

        // Hitung total zakat dengan status 'Bayar'
        $totalZakatBayar = Zakat::where('id_mosque', $mosqueId)
            ->where('status', 'Bayar')
            ->sum('nominal');

        // Hitung total zakat yang sudah disalurkan
        $totalPengeluaranZakat = PenyaluranDana::where('id_mosque', $mosqueId)
            ->where('jenis_dana', 'zakat')
            ->sum('jumlah_penyaluran');

        // Hitung total zakat yang belum disalurkan
        $totalZakatBelumDisalurkan = $totalZakatBayar - $totalPengeluaranZakat;

        $mosque->totalZakat = $totalZakatBayar;
        $mosque->totalPengeluaranZakat = $totalPengeluaranZakat;
        $mosque->totalZakatBelumDisalurkan = $totalZakatBelumDisalurkan;
        $mosque->save();
    }
}
