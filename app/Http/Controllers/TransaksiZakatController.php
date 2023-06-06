<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;
use App\Models\Zakat;
use Twilio\Rest\Client;

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
        ]);

        $validatedData['status'] = 'Belum Bayar';

        $orderItem = Zakat::create($validateData);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $zakatId = $orderItem->id;
        $params = [
        'transaction_details' => [
            'order_id' => 'Cobal-' . $zakatId,
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
            if (strpos($order_id, 'cobal-') !== 0) {
                return response()->json(['message' => 'Invalid order id'], 400);
            }
            $zakat_id = substr($order_id, strlen('cobal-'));
            $zakat = Zakat::find($zakat_id);

            if (!$zakat) {
                return response()->json(['message' => 'Record Zakat tidak ditemukan'], 404);
            }
            $zakat->update(['status' => 'Bayar']);
            // Send WhatsApp notification
            $this->whatsappNotification($zakat->phone, $zakat->nama_donatur);
        }
    }

    public function invoice($id){
        $zakat = Zakat::find($id);
        return view('transaksi.success', compact('zakat'));
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
}
