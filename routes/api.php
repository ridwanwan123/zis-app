<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiZakatController;
use App\Http\Controllers\TransaksiInfaqController;
use App\Http\Controllers\TransaksiSedekahController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/midtrans-callback', function (Request $request) {
    $order_id = strtolower($request->order_id);
    
    if (strpos($order_id, 'zakat-') === 0) {
        $controller = new TransaksiZakatController();
        return $controller->callback($request);
    } elseif (strpos($order_id, 'infaq-') === 0) {
        $controller = new TransaksiInfaqController();
        return $controller->callback($request);
    } elseif (strpos($order_id, 'sedekah-') === 0) {
        $controller = new TransaksiSedekahController();
        return $controller->callback($request);
    }
    
    return response()->json(['message' => 'Invalid order id'], 400);
});

// Route::post('/midtrans-callback', [TransaksiInfaqController::class, 'callback']);
// Route::post('/midtrans-callback', [TransaksiSedekahController::class, 'callback']);