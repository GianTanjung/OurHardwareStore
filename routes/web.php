<?php

use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanTransaksiController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CheckOngkirController;

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
// COBA LAYOUT ===========================================


// PROJECT ===========================================
Route::resources([
    'produk' => ProdukController::class,
    'merk' => MerkController::class,
    'ruangan' => RuanganController::class,
    'kategori' => KategoriController::class,
    // 'notabeli' => ProdukController::class,
    'transaksi' => TransaksiController::class,
    'pelanggan' => PelangganController::class,
    'toko' => TokoController::class,
]);
Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);
Route::resource('detailtransaksi', DetailTransaksiController::class);
Route::resource('promo', PromoController::class);

// User ============================================
Route::group(['middleware' => 'auth'], function () {
    Route::get('/cobalayout', function () {
        return view('checkout.cart');
    });
    // Pelanggan
    Route::get('customer/listProduct', [PelangganController::class, 'katalog'])->name('listProduct');
    Route::post('customer/addCart/{id}', [PelangganController::class, 'addCart'])->name('addCart');
    Route::get('customer/cart', [PelangganController::class, 'cart'])->name('cart');
    Route::delete('customer/handle', [PelangganController::class, 'cartHandler'])->name('handleCart');
    Route::get('customer/deleteOutCart/{id}', [PelangganController::class, 'deleteOutCart'])->name('deleteOutCart');
    Route::get('customer/detail/{id}', [PelangganController::class, 'detail'])->name('detail');
    Route::post('products/increase-count/{id}', [PelangganController::class, 'updateQuantity'])->name('updateQuantity');
    
    Route::get('/getCity/{id}', [CheckOngkirController::class, 'getCity'])->name('getCity');

    Route::get('customer/profile', [PelangganController::class, 'profile'])->name('customer.profile');
    Route::get('customer/profile/update', [PelangganController::class, 'update'])->name('customer.profile.update');

    Route::get('customer/transaction/history', [PelangganController::class, 'transactionHistory'])->name('customer.transaction.history');
});

// Admin ===========================================
Route::middleware(['role:1,2'])->group(function () {
    // Your routes that require the 'admin' role go here
    Route::get('/dashboard', function () {
        return view('dashboard.analytics');
    })->name('home');
    Route::get('/dasboard/analytics', function () {
        return view('dashboard.analytics');
    })->name('dashboard.analytics');
    
    Route::get('/dasboard/sales', function () {
        return view('dashboard.sales');
    })->name('dashboard.sales');
    Route::get('/dasboard/sales', [TransaksiController::class, 'grafikSales'])->name('dashboard.sales');

    // Master ===========================================
        Route::get('/master/produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('/master/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/master/merk', [MerkController::class, 'index'])->name('merk.index');
        Route::get('/master/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
        Route::get('/master/toko', [TokoController::class, 'index'])->name('toko.index');

    // Laporan ===========================================
        Route::get('laporan/penjualan', [TransaksiController::class, 'laporanpenjualan'])->name('laporan.penjualan');

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
    // Laporan ===========================================
        Route::get('/laporan/transaksipenjualan', [LaporanTransaksiController::class, 'index'])->name('laporanpenjualan.index');
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
    // Route::get('pelanggan', [PelangganController::class, 'index'])->name("pelangganList");
    // Route::get('customer/listProduct', [PelangganController::class, 'katalog'])->name('listProduct');
    // Route::post('customer/addCart/{id}', [PelangganController::class, 'addCart'])->name('addCart');
    // Route::get('customer/cart', [PelangganController::class, 'cart'])->name('cart');
    // Route::delete('customer/deleteCart/{id}', [PelangganController::class, 'deleteCart'])->name('deleteCart');
    // Toko
        Route::get('toko', [TokoController::class, 'index'])->name("tokoList");
    // Ruang
        Route::get('ruang', [RuanganController::class, 'index'])->name("ruangList");
        Route::get('ruang/{id}', [RuanganController::class, 'listProduk'])->name("ruangProduk");

});
// Auth::routes();
// City & Province

    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
