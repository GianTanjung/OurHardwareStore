<?php

use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanTransaksiController;
use App\Http\Controllers\MerkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', function () {
    return view('dashboard.analytics');
})->name('home');

// Dashboard ===========================================
Route::get('/dasboard/analytics', function () {
    return view('dashboard.analytics');
})->name('dashboard.analytics');

Route::get('/dasboard/sales', function () {
    return view('dashboard.sales');
})->name('dashboard.sales');

// Master ===========================================
Route::get('/master/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/master/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/master/merk', [MerkController::class, 'index'])->name('merk.index');


//Produk
Route::get('/produk/detail/{id}', [ProdukController::class, 'show'])->name('detailproduk.detail');
Route::get('/master/produk/tambahdata', [ProdukController::class, 'create'])->name('master.insertproduk');
Route::get('/master/kategori/tambahdata', [KategoriController::class, 'create'])->name('master.insertKategori');
Route::get('/master/merk/tambahdata', [MerkController::class, 'create'])->name('master.insertMerk');
Route::put('/addProduk', [ProdukController::class, 'store'])->name('addProduk');
Route::get('/master/produkEdit/{id}', [ProdukController::class, 'edit'])->name("produkEdit");
Route::put('/produkUpdate', [ProdukController::class, 'update'])->name('produkUpdate');
Route::get('/master/produkDelete/{id}', [ProdukController::class, 'destroy'])->name("produkDelete");

// Transaksi ===========================================
Route::get('/transaksi/penjualan', [TransaksiController::class, 'index'])->name('transaksi.jual');
Route::get('/transaksi/penjualan/{id}', [DetailTransaksiController::class, 'show'])->name('detailtransaksi.jual');
// Route::get('/transaksi/pembelian', [TransaksiController::class, 'index'])->name('transaksi.beli');



// Laporan ===========================================
Route::get('/laporan/penjualan', [LaporanTransaksiController::class, 'index'])->name('laporanpenjualan.index');

Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('pelanggan', PelangganController::class);
Route::get('ruangan', [RuanganController::class, 'index']);
Route::get('toko', [TokoController::class, 'index']);

Route::resource('transaksi', TransaksiController::class);
Route::resource('detailtransaksi', DetailTransaksiController::class);
Route::resource('promo', PromoController::class);

// Kategori
    Route::get('kategori/{id}', [KategoriController::class, 'listProduk'])->name("kategoriProduk");
    Route::put('/addKategori', [KategoriController::class, 'store'])->name('addKategori');
    Route::get('/master/kategoriEdit/{id}', [KategoriController::class, 'edit'])->name("kategoriEdit");
    Route::put('/kategoriUpdate', [KategoriController::class, 'update'])->name('kategoriUpdate');
    Route::get('/master/kategoriDelete/{id}', [KategoriController::class, 'destroy'])->name("kategoriDelete");
// Merk
    Route::get('merkProduk/{id}', [MerkController::class, 'listProduk'])->name("merkProduk");
    Route::put('/addMerk', [MerkController::class, 'store'])->name('addMerk');
    Route::get('/master/merkEdit/{id}', [MerkController::class, 'edit'])->name("merkEdit");
    Route::put('/merkUpdate', [MerkController::class, 'update'])->name('merkUpdate');
    Route::get('/master/merkDelete/{id}', [MerkController::class, 'destroy'])->name("merkDelete");
// Pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name("pelangganList");
// Toko
    Route::get('toko', [TokoController::class, 'index'])->name("tokoList");
// Ruang
    Route::get('ruang', [RuanganController::class, 'index'])->name("ruangList");
    Route::get('ruang/{id}', [RuanganController::class, 'listProduk'])->name("ruangProduk");
?>