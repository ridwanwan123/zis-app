<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;
use App\Models\Sedekah;
use Twilio\Rest\Client;


class TransaksiSedekahController extends Controller
{
    public function createSedekah()
    {   
        $mosques = Mosque::all();
        return view('transaksi.sedekah', ['mosques' => $mosques]);
    }

    public function storeSedekah(Request $request)
    {
       $validatedData = $request->validate([
        'id_mosque' => 'required',
        'nama_donatur' => 'required',
        'phone' => 'required',
        'nominal' => 'required',
    ]);

    $validatedData['status'] = 'Belum Bayar';

    $orderItem = Sedekah::create($validatedData);

    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $sedekahId = $orderItem->id;
    $params = [
        'transaction_details' => [
            'order_id' => 'Cobas-' . $sedekahId,
            'gross_amount' => $orderItem->nominal,
        ],
        'customer_details' => [
            'name' => $orderItem->nama_donatur,
            'phone' => $orderItem->phone,
        ],
    ];
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    // dd($snapToken);
    return view('transaksi.pembayaran', compact('snapToken', 'orderItem'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $expectedSignatureKey = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($expectedSignatureKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 400);
        }

        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $order_id = $request->order_id;
            if (strpos($order_id, 'Cobas-') !== 0) {
                return response()->json(['message' => 'Invalid order id'], 400);
            }
            $sedekah_id = substr($order_id, strlen('Cobas-'));
            $sedekah = Sedekah::find($sedekah_id);

            if (!$sedekah) {
                return response()->json(['message' => 'Record Sedekah tidak ditemukan'], 404);
            }
            $sedekah->update(['status' => 'Bayar']);
            // Send WhatsApp notification
            $this->whatsappNotification($sedekah->phone, $sedekah->nama_donatur);
        }
    }

    public function invoice($id){
        $sedekah = Sedekah::find($id);
        return view('transaksi.success', compact('sedekah'));
    }

    public function whatsappNotification(string $recipient, string $namaDonatur)
    {
        $sid    = getenv("TWILIO_AUTH_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from= getenv("TWILIO_WHATSAPP_FROM");

        $twilio = new Client($sid, $token);

        $body = "Halo $namaDonatur, Pembayaran Sedekah Anda telah berhasil. Terima kasih atas kontribusinya.";

        return $twilio->messages->create("whatsapp:$recipient",["from" => "whatsapp:$wa_from", "body" => $body]);
    }
}
