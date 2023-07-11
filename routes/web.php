<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\MosqueController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\SedekahController;
use App\Http\Controllers\MustahikController;
use App\Http\Controllers\SkorKriteriaController;
use App\Http\Controllers\KriteriaController;


use App\Http\Controllers\TransaksiZakatController;
use App\Http\Controllers\TransaksiInfaqController;
use App\Http\Controllers\TransaksiSedekahController;
use App\Http\Controllers\ReportsZisController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});



Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');


Route::group(['middleware' =>['auth.login']], function (){
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/changePassword', [LoginController::class, 'password'])->name('login.changePassword');
    Route::post('/changePasswordd', [LoginController::class, 'changePassword'])->name('login.changePasswordd');

    //Route CRUD Mosque
    Route::get('/mosques', [MosqueController::class, 'index'])->name('mosque');
    
    Route::get('/mosques/create', [MosqueController::class, 'create'])->name('mosque.create');
    Route::post('/mosques/store', [MosqueController::class, 'store'])->name('mosque.store');

    Route::get('/mosques/edit/{id}', [MosqueController::class, 'edit'])->name('mosque.edit');
    Route::put('/mosques/edit/{id}', [MosqueController::class, 'update'])->name('mosque.update');

    Route::delete('/mosques/delete/{id}', [MosqueController::class, 'destroy'])->name('mosque.delete');

    //Route CRUD ADMIN
    Route::get('/pengelolaZIS', [AdminController::class, 'index'])->name('adminZIS');

    Route::get('/pengelolaZIS/create', [AdminController::class, 'create'])->name('adminZIS.create');
    Route::post('/pengelolaZIS/store', [AdminController::class, 'store'])->name('adminZIS.store');

    Route::get('/pengelolaZIS/edit/{id}', [AdminController::class, 'edit'])->name('adminZIS.edit');
    Route::put('/pengelolaZIS/edit/{id}', [AdminController::class, 'update'])->name('adminZIS.update');

    Route::delete('/pengelolaZIS/delete/{id}', [AdminController::class, 'destroy'])->name('adminZIS.delete');
    
    //Route CRUD Zakats
    Route::get('/zakats', [ZakatController::class, 'index'])->name('zakat');

    Route::get('/zakats/create', [ZakatController::class, 'create'])->name('zakat.create');
    Route::post('/zakats/store', [ZakatController::class, 'store'])->name('zakat.store');

    Route::get('/zakats/edit/{id}', [ZakatController::class, 'edit'])->name('zakat.edit');
    Route::put('/zakats/edit/{id}', [ZakatController::class, 'update'])->name('zakat.update');

    Route::delete('/zakats/delete/{id}', [ZakatController::class, 'destroy'])->name('zakat.delete');

    //Route CRUD Infaqs
    Route::get('/infaqs', [InfaqController::class, 'index'])->name('infaq');
    
    Route::get('/infaqs/create', [InfaqController::class, 'create'])->name('infaq.create');
    Route::post('/infaqs/store', [InfaqController::class, 'store'])->name('infaq.store');

    Route::get('/infaqs/edit/{id}', [InfaqController::class, 'edit'])->name('infaq.edit');
    Route::put('/infaqs/edit/{id}', [InfaqController::class, 'update'])->name('infaq.update');

    Route::delete('/infaqs/delete/{id}', [InfaqController::class, 'destroy'])->name('infaq.delete');

    Route::get('/infaqs/pdf', [InfaqController::class, 'generatePDF'])->name('infaq.generatePDF');


    //Route CRUD Sedekahs
    Route::get('/sedekahs', [SedekahController::class, 'index'])->name('sedekah');
    
    Route::get('/sedekahs/create', [SedekahController::class, 'create'])->name('sedekah.create');
    Route::post('/sedekahs/store', [SedekahController::class, 'store'])->name('sedekah.store');

    Route::get('/sedekahs/edit/{id}', [SedekahController::class, 'edit'])->name('sedekah.edit');
    Route::put('/sedekahs/edit/{id}', [SedekahController::class, 'update'])->name('sedekah.update');

    Route::delete('/sedekahs/delete/{id}', [SedekahController::class, 'destroy'])->name('sedekah.delete');

    Route::get('/sedekahs/pdf', [SedekahController::class, 'generatePDF'])->name('sedekah.generatePDF');


    //Route Sistem Pendukung Keputusan
    Route::get('/mustahik', [MustahikController::class, 'index'])->name('mustahik');
    Route::get('/mustahik/create', [MustahikController::class, 'create'])->name('mustahik.create');
    Route::post('/mustahik/store', [MustahikController::class, 'store'])->name('mustahik.store');
    Route::get('/kriteria/create/{id_mustahik}', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/skor-kriterias/{id_mustahik}', [SkorKriteriaController::class, 'show'])->name('skor_kriteria.show');
    Route::get('/hasilSPK',[SkorKriteriaController::class, 'indexAll'])->name('hasilSPK');
});

//MUZAKI-Zakat
Route::get('/bayarZakat', [TransaksiZakatController::class, 'createZakat'])->name('TransaksiZakat');
Route::post('/bayarZakat', [TransaksiZakatController::class, 'storeZakat'])->name('TransaksiZakat.store');
Route::get('/invoice/{id}', [TransaksiZakatController::class, 'invoice']);


//MUZAKI-Infaq
Route::get('/bayarInfaq', [TransaksiInfaqController::class, 'createInfaq'])->name('TransaksiInfaq');
Route::post('/bayarInfaq', [TransaksiInfaqController::class, 'storeInfaq'])->name('TransaksiInfaq.store');
Route::get('/invoice/{id}', [TransaksiInfaqController::class, 'invoice']);


//MUZAKI-Sedekah
Route::get('/bayarSedekah', [TransaksiSedekahController::class, 'createSedekah'])->name('TransaksiSedekah');
Route::post('/bayarSedekah', [TransaksiSedekahController::class, 'storeSedekah'])->name('TransaksiSedekah.store');
Route::get('/invoice/{id}', [TransaksiSedekahController::class, 'invoice']);

// Reporting
Route::get('/laporanZIS', [ReportsZisController::class, 'index'])->name('Reporting');

Route::get('/success', function () {
    return view('transaksi.success');
})->name('success');








