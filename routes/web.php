<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegistrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\data\ProdukController;
use App\Http\Controllers\data\PelangganController;
use App\Http\Controllers\data\PenjualanController;
use App\Http\Controllers\data\DetailPenjualanController;
use App\Http\Controllers\data\UserController;

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

// Route::get('/', function () {
//     return view('Layouts.layout');
// });

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/authentication',[LoginController::class,'authentication'])->name('authentication');

// ROUTE REGISTRASI
Route::get('/registrasi_petugas',[RegistrasiController::class, 'registrasi'])->name('registrasi_petugas');
Route::post('/registrasi_petugas/save',[RegistrasiController::class, 'registrasi_save'])->name('registrasi_petigas_save');

/*----->  ROUTE SETELAH LOGIN */
Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    /* ROUTE DATA PRODUK */
    Route::resource('data_produk',ProdukController::class);
    Route::get('data_produk_export_pdf',[ProdukController::class, 'export_pdf'])->name('data_produk.export_pdf');
    Route::get('data_produk_export_excel',[ProdukController::class, 'export_excel'])->name('data_produk.export_excel');
    /* END ROUTE DATA PRODUK */

    /* ROUTE DATA PELANGGAN */
    Route::resource('data_pelanggan',PelangganController::class);
    Route::get('data_pelanggan_export_pdf',[PelangganController::class, 'export_pdf'])->name('data_pelanggan.export_pdf');
    Route::get('data_pelanggan_export_excel',[PelangganController::class, 'export_excel'])->name('data_pelanggan.export_excel');
    Route::post('data_pelanggan_import_excel',[PelangganController::class, 'import_excel'])->name('data_pelanggan.import_excel');
    /* END ROUTE DATA PELANGGAN */
    Route::resource('data_penjualan',PenjualanController::class);
    Route::resource('detail_penjualan',DetailPenjualanController::class);
    Route::resource('data_user',UserController::class);
    
    Route::get('/transaksi/{id}',[PenjualanController::class, 'transaksi'])->name('transaksi');
    
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    });
/*-------> END ROUTE SETELAH LOGIN */
