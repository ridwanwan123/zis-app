<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;
use App\Models\Infaq;
use Twilio\Rest\Client;
use App\Models\PenyaluranDana;

use Illuminate\Support\Str;

class TransaksiInfaqController extends Controller
{
    public function createInfaq()
    {
        $mosques = Mosque::all();
        return view('transaksi.infaq', ['mosques' => $mosques]);
    }

    public function storeInfaq(Request $request)
    {
        $validateData = $request->validate([
            'id_mosque' => 'required',
            'nama_donatur' => 'required',
            'phone' => 'required',
            'nominal' => 'required',
        ], [
            'id_mosque.required' => 'Pilih masjid terlebih dahulu.',
            'nama_donatur.required' => 'Nama donatur harus diisi.',
            'phone.required' => 'Nomor telepon harus diisi.',
            'nominal.required' => 'Nominal harus diisi.',
        ]);

        $validateData['status'] = 'Belum Bayar';
        
        // Simpan data infaq ke dalam tabel infaqs
        $orderItem = Infaq::create($validateData);

        $this->updateTotalInfaq($request->id_mosque);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $infaqId = $orderItem->id;
        $params = [
            'transaction_details' => [
                'order_id' => 'Infaq-' . $infaqId,
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
            if (strpos($order_id, 'infaq-') !== 0) {
                return response()->json(['message' => 'Invalid order id'], 400);
            }
            $infaq_id = substr($order_id, strlen('infaq-'));
            $infaq = Infaq::find($infaq_id);

            if (!$infaq) {
                return response()->json(['message' => 'Record Infaq tidak ditemukan'], 404);
            }
            $infaq->update(['status' => 'Bayar']);

            // Update totalInfaq pada entitas Mosque
            $this->updateTotalInfaq($infaq->id_mosque);
            
            // Send WhatsApp notification
            $this->whatsappNotification($infaq->phone, $infaq->nama_donatur);
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

        $body = "Halo $namaDonatur, Pembayaran Infaq Anda telah berhasil. Terima kasih atas kontribusinya.";

        return $twilio->messages->create("whatsapp:$recipient",["from" => "whatsapp:$wa_from", "body" => $body]);
    }

    private function updateTotalInfaq($mosqueId)
    {
        $mosque = Mosque::find($mosqueId);

        // Hitung total infaq dengan status 'Bayar'
        $totalInfaqBayar = Infaq::where('id_mosque', $mosqueId)
            ->where('status', 'Bayar')
            ->sum('nominal');

        // Hitung total infaq yang sudah disalurkan
        $totalPengeluaranInfaq = PenyaluranDana::where('id_mosque', $mosqueId)
            ->where('jenis_dana', 'infaq')
            ->sum('jumlah_penyaluran');

        // Hitung total infaq yang belum disalurkan
        $totalInfaqBelumDisalurkan = $totalInfaqBayar - $totalPengeluaranInfaq;

        $mosque->totalInfaq = $totalInfaqBayar;
        $mosque->totalPengeluaranInfaq = $totalPengeluaranInfaq;
        $mosque->totalInfaqBelumDisalurkan = $totalInfaqBelumDisalurkan;
        $mosque->save();
    }
}
