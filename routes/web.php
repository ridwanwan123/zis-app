<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\ZakatController;


use App\Http\Controllers\TransaksiZISController;

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

    //Route CRUD ADMIN
    Route::get('/pengelolaZIS', [AdminController::class, 'index'])->name('adminZIS');

    Route::get('/pengelolaZIS/create', [AdminController::class, 'create'])->name('adminZIS.create');
    Route::post('/pengelolaZIS/store', [AdminController::class, 'store'])->name('adminZIS.store');

    Route::get('/pengelolaZIS/edit/{id}', [AdminController::class, 'edit'])->name('adminZIS.edit');
    Route::put('/pengelolaZIS/edit/{id}', [AdminController::class, 'update'])->name('adminZIS.update');

    Route::delete('/pengelolaZIS/delete/{id}', [AdminController::class, 'destroy'])->name('adminZIS.delete');
    
    
    //Route CRUD Infaqs
    Route::get('/infaqs', [InfaqController::class, 'index'])->name('infaq');
    
    Route::get('/infaqs/create', [InfaqController::class, 'create'])->name('infaq.create');
    Route::post('/infaqs/store', [InfaqController::class, 'store'])->name('infaq.store');

    Route::get('/infaqs/pdf', [InfaqController::class, 'generatePDF'])->name('infaq.generatePDF');

    //Route CRUD Zakat
    Route::get('/zakat', [ZakatController::class, 'index'])->name('zakat');

    //MUZAKI
    Route::get('/tunaikanZIS', [TransaksiZISController::class, 'index'])->name('formulir');
});









