<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MerkController;

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
Route::get('albumProduk', [ProdukController::class, 'album']);

Route::get('/user/{id?}', function($id='') {
    if ($id==true) echo 'detail user';
    else echo 'list orang';
});
//atau
// Route::get('/user', function() {
//     echo 'list user';
// });
// Route::get('/user/{id}', function($id) {
//     echo 'list user';
// });

Route::get('/baju', function () {
    echo 'ini halaman baju';
});

Route::get('/celana', function () {
    echo 'ini halaman celana';
})->name('celananih');

Route::get('/celana/{id}/profile', function ($id) {
    echo 'ini profile celana';
})->name('celana');

Route::get('/kategori/{id}', function ($id) {
    return view('listkategori',['code' => $id]);
})->name('listkategori');

//AktivitasKelas
Route::get('/kategori/{id}', function ($id) {
    return view('listkategori',['code' => $id]);
})->name('listkategori');
Route::get('/kategori/{id}/detail', function ($id) {
    return view('detailkategori',['code' => $id]);
})->name('detailkategori');
Route::get('/produk/{id}', function ($id) {
    return view('listproduk',['code' => $id]);
})->name('listproduk');
Route::get('/produk/{id}/detail', function ($id) {
    return view('detailproduk',['code' => $id]);
})->name('detailproduk');



//Week 1
Route::get('/', function () {
    return view('welcome');
});

Route::get('/belakang', function () {
    echo 'halaman admin';
});


// Public Section PrestaShop
Route::get('/registration', function () {
    echo 'ini halaman registrasi';
});
Route::get('/login', function () {
    echo 'ini halaman login ';
});
Route::get('/password-recovery', function () {
    echo 'ini halaman forgot password';
});
Route::get('/front', function () {
    echo 'ini halaman dashboard';
});
Route::get('/3-clothes', function () {
    echo 'ini halaman kategori produk pakaian';
});
Route::get('/6 accessories', function () {
    echo 'ini halaman kategori produk aksesoris';
});
Route::get('/9-art', function () {
    echo 'ini halaman kategoriproduk  art';
});
Route::get('/4-men', function () {
    echo 'ini halaman produk pakaian pria';
});
Route::get('/5-women', function () {
    echo 'ini halaman produk pakaian wanita';
});
Route::get('7-stationery', function () {
    echo 'ini halaman produk alat tulis';
});
Route::get('/8-home-stationery', function () {
    echo 'ini halaman produk aksesoris rumah';
});
Route::get('/contact-us', function () {
    echo 'ini halaman contact us';
});
Route::get('/brands', function () {
    echo 'ini halaman brand produk';
});
Route::get('/brands/2-graphic-corner', function () {
    echo 'ini halaman graphic corner';
});
Route::get('/brands/1-studio-design', function () {
    echo 'ini halaman studio design';
});
Route::get('/supplier/2-accessories-supplier', function () {
    echo 'ini halaman suplier aksesoris';
});
Route::get('/supplier/1-fashion-supplier', function () {
    echo 'ini halaman supplier fashion';
});
Route::get('/cart?action=show', function () {
    echo 'ini halaman keranjang';
});
Route::get('/order', function () {
    echo 'ini halaman checkout';
});
Route::get('/order#', function () {
    echo 'ini halaman detail produk pada order';
});
Route::get('/content/3-terms-and-conditios-of-use', function () {
    echo 'ini halaman term of service';
});
Route::get('/my-account', function () {
    echo 'ini halaman akun user';
});
Route::get('identity', function () {
    echo 'ini halaman identity user';
});
Route::get('addresses', function () {
    echo 'ini halaman alamat user';
});
Route::get('/order-history', function () {
    echo 'ini halaman histori order';
});
Route::get('/credit-slip', function () {
    echo 'ini halaman credit slips';
});
Route::get('/module/blockwishlist/lists', function () {
    echo 'ini halaman wishlist';
});
Route::get('/module/psgdpr/gdpr', function () {
    echo 'ini halaman personnal data';
});
Route::get('/module/psgdpr/ExportDataToPdf?psgdpr_token=985a89384544d4c4c06aa7873015ceab1f5fd340', function () {
    echo 'ini halaman download personal data ke pdf';
});
Route::get('/module/psgdpr/ExportDataToCsv?psgdpr_token=985a89384544d4c4c06aa7873015ceab1f5fd340', function () {
    echo 'ini halaman download persoal data ke csv';
});
Route::get('/module/ps_emailalerts/account', function () {
    echo 'ini halaman email alerts';
});


//Administration Section PrestaShop
Route::get('/admin-dev/index.php?controller=AdminDashboard&token=8e63dcc1bef1df647608f054a473784e#/update-needed?metricsIsUpToDate=false&eventBusIsInstalled=true&eventBusIsUpToDate=true&eventBusIsEnabled=true&accountsIsInstalled=true&accountsIsUpToDate=true&accountsIsEnabled=true', function () {
    echo 'ini halaman dashboard admin';
});
Route::get('/admin-dev/index.php/sell/orders/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman list orders admin';
});
Route::get('/admin-dev/index.php/sell/orders/invoices/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman list invoices admin';
});
Route::get('/admin-dev/index.php/sell/orders/credit-slips/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman list credit slip';
});
Route::get('/admin-dev/index.php/sell/orders/delivery-slips/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman list delivery slip';
});
Route::get('/admin-dev/index.php?controller=AdminCarts&token=8d0daec004051715d00b92f2ae963519', function () {
    echo 'ini halaman keranjang admin';
});
Route::get('/admin-dev/index.php/sell/catalog/products?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman katalog produk';
});
Route::get('/admin-dev/index.php/sell/catalog/categories?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman katalog list kategori';
});
Route::get('/admin-dev/index.php/sell/catalog/monitoring/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman katalog monitoring';
});
Route::get('/admin-dev/index.php?controller=AdminAttributesGroups&token=e1bae9d6d2f6f992512e69b22a0e82e1', function () {
    echo 'ini halaman atribut dan fitur';
});
Route::get('/admin-dev/index.php/sell/catalog/brands/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman katalog brand dan suplier';
});
Route::get('/admin-dev/index.php/sell/attachments/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman list files';
});
Route::get('/admin-dev/index.php?controller=AdminCartRules&token=279b36576b3e2461ab77e745ebfefb4a', function () {
    echo 'ini halaman katalog diskon';
});
Route::get('/admin-dev/index.php/sell/stocks/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman stok';
});
Route::get('/admin-dev/index.php/sell/customers/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman customer';
});
Route::get('/admin-dev/index.php/sell/addresses/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman alamat customer';
});
Route::get('/admin-dev/index.php?controller=AdminCustomerThreads&token=bd293112bb090566235f655e1112e4cd', function () {
    echo 'ini halaman customer service';
});
Route::get('/admin-dev/index.php/sell/customer-service/order-messages/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman customer service order messages';
});
Route::get('/admin-dev/index.php?controller=AdminReturn&token=5eb7bd352001be90656603d9e9ab58e9
', function () {
    echo 'ini halaman customer service retur barang';
});
Route::get('/admin-dev/index.php?controller=AdminStats&token=7a5c3f6cf74e44d9ce55508506eb543b#/dashboard
', function () {
    echo 'ini halaman stats';
});
Route::get('/admin-dev/index.php/modules/metrics?settings_redirect=1&_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg#/settings
', function () {
    echo 'ini halaman stats metric prestashop';
});
Route::get('/admin-dev/index.php/modules/mbo/modules/catalog/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman module marketplace ';
});
Route::get('/admin-dev/index.php/improve/modules/manage?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman module manager';
});
Route::get('/admin-dev/index.php/improve/design/themes/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman desian tema dan logo';
});
Route::get('/admin-dev/index.php/modules/mbo/themes/catalog/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman katalog tema desain';
});
Route::get('/admin-dev/index.php/improve/design/mail_theme/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman desain tema email';
});
Route::get('/admin-dev/index.php/improve/design/cms-pages/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman desain halaman';
});
Route::get('/admin-dev/index.php/improve/design/modules/positions/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman posisi desain';
});
Route::get('/admin-dev/index.php?controller=AdminImages&token=e2e316949912d72cb1581178bbf1896f', function () {
    echo 'ini halaman setting gambar';
});
Route::get('/admin-dev/index.php/modules/link-widget/list?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman list link desain';
});
Route::get('/admin-dev/index.php?controller=AdminCarriers&token=e5a147158ae1fe97dc4a0bde4d1f4e78', function () {
    echo 'ini halaman operator pengiriman';
});
Route::get('/admin-dev/index.php/improve/shipping/preferences/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman preferensi pengiriman';
});
Route::get('/admin-dev/index.php?controller=AdminMbeShipping&token=6fe1ac658d36ead49522297c629b9ebd
', function () {
    echo 'ini halaman MBE shipments';
});
Route::get('/admin-dev/index.php/improve/payment/payment_methods?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman metode pembayaran';
});
Route::get('/admin-dev/index.php/improve/payment/preferences?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman preferensi pembayaran';
});
Route::get('/admin-dev/index.php/improve/international/localization/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman lokalisasi internasional';
});
Route::get('/admin-dev/index.php/improve/international/zones/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman lokasi internasional';
});
Route::get('/admin-dev/index.php/improve/international/taxes/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman pajak internasional';
});
Route::get('/admin-dev/index.php/improve/international/translations/settings?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman translate';
});
Route::get('/admin-dev/index.php?controller=AdminPsfacebookModule&token=d5664735ab3aae148950683881d783b9#/configuration
', function () {
    echo 'ini halaman link mareting facebook dan instagram';
});
Route::get('/admin-dev/index.php?controller=AdminPsxMktgWithGoogleModule&token=6b64665197a1bec9bdfbfa77b7fe800a#/landing-page', function () {
    echo 'ini halaman link marketing google';
});
Route::get('/admin-dev/index.php/configure/shop/preferences/preferences?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman general shop parameters';
});
Route::get('/admin-dev/index.php/configure/shop/order-preferences/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman order settings shop parameters';
});
Route::get('/admin-dev/index.php/configure/shop/product-preferences/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman product setting shop parameters';
});
Route::get('/admin-dev/index.php/configure/shop/customer-preferences/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman customer setting shop parameters';
});
Route::get('/admin-dev/index.php/configure/shop/contacts/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman contact shop parameters';
});
Route::get('/admin-dev/index.php/configure/shop/seo-urls/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman traffic dan SEo shop parameters';
});
Route::get('/admin-dev/index.php?controller=AdminSearchConf&token=1481208e534ee9c2123f113369caaa4b
', function () {
    echo 'ini halaman search shop parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/system-information/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman information advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/performance/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman performance advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/administration/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman adinistration advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/emails/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman email advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/import/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman import advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/employees/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman teams advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/sql-requests/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman database advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/logs/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman logs advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/webservice-keys/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman webservice advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/feature-flags/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg
', function () {
    echo 'ini halaman new and experimental features advanced parameters';
});
Route::get('/admin-dev/index.php/configure/advanced/security/?_token=d3fsMMzxpXro0e_cdi9xj3ZdNIOhtIDoByohpjicxgg', function () {
    echo 'ini halaman security advanced parameters';
});


// Public Section depobangunan
Route::get('/tentang-kami', function () {
    echo 'ini halaman tentang kami';
});
Route::get('/contact', function () {
    echo 'ini halaman kontak kami ';
});
Route::get('/faq', function () {
    echo 'ini halaman FAQ ';
});
Route::get('/kebijakan-privasi', function () {
    echo 'ini halaman kebijakan privasi';
});
Route::get('syarat-ketentuan', function () {
    echo 'ini halaman syarat dan ketentuan';
});
Route::get('/kegiatan-sosial', function () {
    echo 'ini halaman kegiatan sosial';
});
Route::get('/store-locator', function () {
    echo 'ini halaman store locations';
});
Route::get('/customer/accout/login', function () {
    echo 'ini halaman login';
});
Route::get('/all-categories/builder-hardwares
', function () {
    echo 'ini halaman produk kategori builder hardware';
});
Route::get('/all-categories/electrical', function () {
    echo 'ini halaman produk kategori electronik';
});
Route::get('/all-categories/flooring', function () {
    echo 'ini halaman produk kategori lantai';
});
Route::get('/all-categories/housewares', function () {
    echo 'ini halaman produk kategori peralatan rumah';
});
Route::get('/all-categories/paints', function () {
    echo 'ini halaman produk kategori cat';
});
Route::get('/all-categories/plumbing-sanitary', function () {
    echo 'ini halaman produk kategori sanitari';
});
Route::get('/all-categories/tools', function () {
    echo 'ini halaman produk kategori peralatan';
});
Route::get('/shop-by-brands/sanlex', function () {
    echo 'ini halaman produk brand sanlex';
});
Route::get('/shop-by-brands/flexy-coat', function () {
    echo 'ini halaman produk brand flexy coat';
});
Route::get('/shop-by-brands/arca', function () {
    echo 'ini halaman produk brand arca';
});
Route::get('/shop-by-brands/brillo', function () {
    echo 'ini halaman produk brand brillo';
});
Route::get('/shop-by-brands/magix', function () {
    echo 'ini halaman produk brands magix';
});
Route::get('/shop-by-brands/aquaproof', function () {
    echo 'ini halaman produk brand aquaproof';
});
Route::get('/shop-by-brands/scg', function () {
    echo 'ini halaman produk brand scg';
});
Route::get('/shop-by-rooms', function () {
    echo 'ini halaman list kategori produk berdasarkan ruang';
});
Route::get('/shop_by_room_detail_dapur', function () {
    echo 'ini halaman produk dapur';
});
Route::get('/shop_by_room_detail_ruang_tamu', function () {
    echo 'ini halaman produk ruang tamu';
});
Route::get('/shop_by_room_detail_kamar_tidur', function () {
    echo 'ini halaman produk kamar tidur';
});
Route::get('/shop_by_room_detail_ruang_makan', function () {
    echo 'ini halaman produk ruang makan';
});
Route::get('/shop_by_room_detail_luar_ruang', function () {
    echo 'ini halaman produk luar ruang';
});
Route::get('/shop_by_room_detail_kamar_mandi', function () {
    echo 'ini halaman produk kamar mandi';
});
Route::get('/featured', function () {
    echo 'ini halaman featured produk';
});
Route::get('/promotion', function () {
    echo 'ini halaman promosi';
});
?>