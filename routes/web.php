<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\LaporanTransaksiController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KategoriController;

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
//     return view('welcome');
// });

// Week 4
Route::resource('produk', ProdukController::class);
Route::resource('merk', MerkController::class);
Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('pelanggan', PelangganController::class);
Route::get('ruangan', [RuanganController::class, 'index']);
Route::get('toko', [TokoController::class, 'index']);
Route::get('laporantransaksi', [LaporanTransaksiController::class, 'index']);

Route::resource('transaksi', TransaksiController::class);
Route::resource('detailtransaksi', DetailTransaksiController::class);
Route::resource('promo', PromoController::class);

// Kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name("kategoriList");
    Route::get('kategori/{id}', [KategoriController::class, 'listProduk'])->name("kategoriProduk");
// Merk
    Route::get('merk', [MerkController::class, 'index'])->name("markList");
    Route::get('merkProduk/{id}', [MerkController::class, 'listProduk'])->name("merkProduk");
// Pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name("pelangganList");
// Toko
    Route::get('toko', [TokoController::class, 'index'])->name("tokoList");
// Ruang
    Route::get('ruang', [RuanganController::class, 'index'])->name("ruangList");
    Route::get('ruang/{id}', [RuanganController::class, 'listProduk'])->name("ruangProduk");


Route::get('albumProduk', [ProdukController::class, 'album']);

Route::get('/user/{id?}', function($id='') {
    if ($id==true) echo 'detail user';
    else echo 'list orang';
});
?>