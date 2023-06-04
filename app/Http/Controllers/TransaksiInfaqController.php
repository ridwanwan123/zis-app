<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;
use App\Models\Infaq;
use Twilio\Rest\Client;


class TransaksiInfaqController extends Controller
{
    public function createInfaq()
    {   
        $mosques = Mosque::all();
        return view('transaksi.infaq', ['mosques' => $mosques]);
    }

    public function storeInfaq(Request $request)
    {
       $validatedData = $request->validate([
        'id_mosque' => 'required',
        'nama_donatur' => 'required',
        'phone' => 'required',
        'nominal' => 'required',
    ]);

    $validatedData['status'] = 'Belum Bayar';

    $orderItem = Infaq::create($validatedData);

    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $infaqId = $orderItem->id;
    $params = [
        'transaction_details' => [
            'order_id' => 'Coba-' . $infaqId,
            'gross_amount' => $orderItem->nominal,
        ],
        'customer_details' => [
            'name' => $orderItem->nama_donatur,
            'phone' => $orderItem->phone,
        ],
    ];
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    // dd($snapToken);
    // Send WhatsApp notification
    // $this->whatsappNotification($orderItem->phone);  //Rencananya ingin membuat notifkasi remember untuk membayar zis
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
            if (strpos($order_id, 'coba-') !== 0) {
                return response()->json(['message' => 'Invalid order id'], 400);
            }
            $infaq_id = substr($order_id, strlen('coba-'));
            $infaq = Infaq::find($infaq_id);

            if (!$infaq) {
                return response()->json(['message' => 'Record Infaq tidak ditemukan'], 404);
            }
            $infaq->update(['status' => 'Bayar']);
            // Send WhatsApp notification
            $this->whatsappNotification($infaq->phone, $infaq->nama_donatur);
        }
    }

    public function invoice($id){
        $infaq = Infaq::find($id);
        return view('transaksi.success', compact('infaq'));
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
}
