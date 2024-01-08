<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\Pelanggan;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Province;
use App\Models\City;
// use App\Models\Keranjang;
// use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Produks;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelangganList = Pelanggan::all();
        return view('pelanggan.pelangganList',compact('pelangganList'));
    }

    public function katalog(Request $request)
    {
        $user = Auth::user();
        // dd($user->id);
        $pelanggan = Pelanggan::where('user_id',$user->id)->first();
        // dd($pelanggan);
        // hardcode
        // $pelanggan = Pelanggan::where('user_id',5)->first();
        $selectedkategori = $request->input('kategori', []);
        $selectedstore = $request->input('store', []);
        $search = $request->query('search');

        $listProduct = DB::table('produks')->select('id', 'fotoProduk', 'nama', 'harga', (DB::raw("CONCAT(SUBSTRING_INDEX(deskripsi, ' ', 20),'...') AS deskripsi")))->get();

        if($selectedkategori != null){
            $listProduct = DB::table('produks as p')->select('p.id', 'p.fotoProduk', 'p.nama', 'p.harga', (DB::raw("CONCAT(SUBSTRING_INDEX(p.deskripsi, ' ', 20),'...') AS deskripsi")))
            ->join('produk_tokos as t', 't.produk_id', '=', 'p.id')->whereIn('p.kategori_id', $selectedkategori)->where('t.stok', '>', 0)->get();
        }

        if($selectedstore != null){
            $listProduct = DB::table('produks as p')->select('p.id', 'p.fotoProduk', 'p.nama', 'p.harga', (DB::raw("CONCAT(SUBSTRING_INDEX(p.deskripsi, ' ', 20),'...') AS deskripsi")))
        ->join('produk_tokos as t', 't.produk_id', '=', 'p.id')->whereIn('t.toko_id', $selectedstore)->where('t.stok', '>', 0)->get();
        }

        if($selectedstore && $selectedkategori != null){
            $listProduct = DB::table('produks as p')->select('p.id', 'p.fotoProduk', 'p.nama', 'p.harga', (DB::raw("CONCAT(SUBSTRING_INDEX(p.deskripsi, ' ', 20),'...') AS deskripsi")))
        ->join('produk_tokos as t', 't.produk_id', '=', 'p.id')->whereIn('t.toko_id', $selectedstore)->whereIn('p.kategori_id', $selectedkategori)->where('t.stok', '>', 0)->get();
        }

        if($search != null)
        {
            $listProduct = DB::table('produks')->select('id', 'fotoProduk', 'nama', 'harga', (DB::raw("CONCAT(SUBSTRING_INDEX(deskripsi, ' ', 20),'...') AS deskripsi")))->where('nama', 'like', '%' . $search . '%')->get();
        }

        // $listCart = DB::table('keranjangs as k')->select('p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', Auth::user()->id)->get();
        $listCart = DB::table('keranjangs as k')->select('k.id','p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
        $subTotal = DB::table('keranjangs as k')->select('p.harga', 'k.kuantitas    ')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->sum(DB::raw('harga * kuantitas'));
        $vat = $subTotal*20/100;
        $total = $subTotal+$vat;
        $count = DB::table('keranjangs as k')->select('p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->count();
        $kategoris = DB::table('kategoris')->select('*')->get();
        $stores = DB::table('tokos')->select('*')->get();

        return view('checkout.index',compact('listProduct', 'listCart', 'subTotal', 'vat', 'total', 'count', 'kategoris', 'stores', 'selectedkategori', 'selectedstore'));
        // dd($listCart);
    }
    public function updateCart($id,$value){
        $user = Auth::user();
        $pelanggan = Pelanggan::where('user_id',$user->id)->first();

        // $helper = Keranjang::where('pelanggan_id', '=', $pelanggan->id)->where('produk_id', '=', $id)->select('*')->first();
        // dd($helper);
        $helper = Keranjang::where('pelanggan_id', '=', $pelanggan->id)->where('produk_id', '=', $id)->first();
        // dd($helper);
        if($helper->kuantitas != $value){
            $helper->kuantitas = $value;
        }
        $helper->update();
        return redirect()->route('cart');
    }
    public function addCart(Request $request, $id)
    {
        
        $user = Auth::user();
        // dd($user->id);
        $pelanggan = Pelanggan::where('user_id',$user->id)->first();
        // hardcode
        // $pelanggan = Pelanggan::where('user_id',5)->first();

        $selectedstore = $request->input('lokasi');
        // $store = DB::table('tokos')->select('id')->where('id', '=', $selectedstore)->first();

        if($request->input('kuantitas') > 0){
            $jumlah = $request->input('kuantitas');
        }else{
            $jumlah = 1;
        }
        $helper = DB::table('keranjangs')->select('*')->get()->where('pelanggan_id', '=', $pelanggan->id)->where('produk_id', '=', $id)->first();

        if($helper != null && $helper->toko_id == $selectedstore){
            DB::table('keranjangs')
                ->where('id', $helper->id)
                ->update([
                    'kuantitas' => ($helper->kuantitas + 1),
                    // Add more columns as needed
                ]);
        }else{
            $data = array('produk_id'=>$id, 'pelanggan_id'=>$pelanggan->id, 'kuantitas'=>$jumlah, 'toko_id'=>$selectedstore);
            DB::table('keranjangs')->insert($data);
        }

        // $pelanggan = 1;
        // dd($pelanggan);
        

        return redirect()->back();
    }

    public function cart(Request $request)
    {
        $pelanggan = Pelanggan::where('user_id', Auth::user()->id)->first();
        // hardcode
        // $pelanggan = Pelanggan::where('user_id', 5)->first();
        $listCart = DB::table('keranjangs as k')->select('k.id', 'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas', 'k.toko_id', 't.id as idstore', 't.nama as namastore')->join('produks as p', 'p.id', '=', 'k.produk_id')->join('tokos as t', 't.id', '=', 'k.toko_id')->join('produk_tokos as pt', 'pt.toko_id', '=', 't.id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
        // dd($listCart);
        $subTotal = DB::table('keranjangs as k')->select('p.harga', 'k.kuantitas    ')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->sum(DB::raw('harga * kuantitas'));
        $vat = $subTotal*20/100;
        $total = $subTotal+$vat;
        $store = DB::table('keranjangs as k')->select('t.id', 't.nama')->join('tokos as t', 't.id', '=', 'k.toko_id')->get();
        $sidoarjo = DB::table('keranjangs')->where('keranjangs.toko_id', 1)->count();
        $malang = DB::table('keranjangs')->where('keranjangs.toko_id', 2)->count();
        $surabaya = DB::table('keranjangs')->where('keranjangs.toko_id', 3)->count();

        // foreach($listCart as $c){
        //     $stok = DB::table('produk_tokos')->select('stok')->where('produk_tokos.produk_id', '=', $c->id)->groupBy('produk_tokos.produk_id')->sum('stok');
        // }
        // dd($stok);

        $choosen = $request->input('produk', []);
        $message = '';
        $count = 0;
        if($choosen == null)
        {
            $pelanggan = Pelanggan::where('user_id',Auth::user()->id)->first();
            $listCart = DB::table('keranjangs as k')->select('k.id', 'p.id as produk_id' ,'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas', 'k.toko_id', 't.id as idstore', 't.nama as namastore')->join('produks as p', 'p.id', '=', 'k.produk_id')->join('tokos as t', 't.id', '=', 'k.toko_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
            $subTotal = 0;
            $vat = 0;
            $total = 0;
            $store = DB::table('keranjangs as k')->select('t.id', 't.nama')->join('tokos as t', 't.id', '=', 'k.toko_id')->get();
            $sidoarjo = DB::table('keranjangs')->where('keranjangs.toko_id', 1)->count();
            $malang = DB::table('keranjangs')->where('keranjangs.toko_id', 2)->count();
            $surabaya = DB::table('keranjangs')->where('keranjangs.toko_id', 3)->count();
            // echo "works";
        }
        else{
            $pelanggan = Pelanggan::where('user_id',Auth::user()->id)->first();
            $listCart = DB::table('keranjangs as k')->select('k.id','p.id as produk_id', 'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas', 'k.toko_id', 't.id as idstore', 't.nama as namastore')->join('produks as p', 'p.id', '=', 'k.produk_id')->join('tokos as t', 't.id', '=', 'k.toko_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
            $subTotal = DB::table('keranjangs as k')->select('p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->whereIn('k.id', $choosen)->sum(DB::raw('harga * kuantitas'));
            
            $vat = $subTotal*11/100;
            $total = $subTotal+$vat; 
            
            $store = DB::table('keranjangs as k')->select('t.id', 't.nama')->join('tokos as t', 't.id', '=', 'k.toko_id')->get();
            $sidoarjo = DB::table('keranjangs')->where('keranjangs.toko_id', 1)->count();
            $malang = DB::table('keranjangs')->where('keranjangs.toko_id', 2)->count();
            $surabaya = DB::table('keranjangs')->where('keranjangs.toko_id', 3)->count();
            
            // dd($subTotal);

            $toko = DB::table('keranjangs')->select('toko_id')->whereIn('id', $choosen)->groupBy('toko_id')->get();
            foreach($toko as $t)
            {
                $count += 1;
                if($count > 1)
                {
                    // return redirect()->back()->with('message', 'Products must be from the same store.');
                    // echo 'works';
                    $message = 'Products must be from the same store.';
                }
            }
            
        }

        return view('checkout.cart', compact('listCart','subTotal','vat','total', 'store', 'sidoarjo', 'malang', 'surabaya', 'choosen', 'message', 'count'));
        // dd($coba);
    }

    public function cartHandler(Request $request)
    {
        $submitAction = $request->input('button');

        // Perform different actions based on the button clicked
        switch ($submitAction) {
            case 'checkout':
                // Handle action 2
                // $products = $request->input('produk', []);
                return $this->masukOrder($request);
                // dd($count);
                break;

            case 'delete':
                // Handle action 1
                $id = $request->input('id');
                return $this->deleteCart($id);
                break;

            default:
                // Handle the default case or return an error
                // $products = $request->input('produk', []);
                return $this->cart($request);
                break;
        }
    }

    public function deleteCart($id)
    {
        $listCart = DB::table('keranjangs')->where('id', '=', $id)->delete();
        // $listCart->destroy();
        // $cart->destroy($id);
        return redirect()->back();
    }
    public function deleteOutCart($id)
    {
        $listCart = DB::table('keranjangs')->where('id', '=', $id)->delete();
        // $listCart->destroy();
        return redirect()->back();
    }
    public function detail(Request $request, $id)
    {
        $productId = $id;
        $user = Auth::user();
        $pelanggan = Pelanggan::where('user_id',$user->id)->first();
        $listCart = DB::table('keranjangs as k')->select('k.id','p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
        $produk = DB::table('produks as p')->select('p.*', 'pt.stok')->join('produk_tokos as pt', 'pt.produk_id', '=', 'p.id')->join('tokos as t', 't.id', '=', 'pt.toko_id')->where('p.id', '=', $id)->first();
        $lokasi = DB::table('tokos as t')->select('t.nama', 't.id')->join('produk_tokos as pt', 'pt.toko_id', '=', 't.id')->where('pt.produk_id', '=', $id)->where('pt.stok', '>', 0)->distinct('t.nama')->get();
        $stok = DB::table('produk_tokos')->select('stok')->where('produk_tokos.produk_id', '=', $id)->groupBy('produk_tokos.produk_id')->sum('stok');
        $cekStock = DB::table('produk_tokos')->select(DB::raw('SUM(produk_tokos.stok) as stok'), 'tokos.nama')->join('tokos', 'tokos.id', '=', 'produk_tokos.toko_id')->where('produk_tokos.produk_id', '=', $id)->groupBy('produk_tokos.toko_id')->get();
        // $max = 1;
        $choosen = $request->session()->get('choosen', null);
        $max = $request->session()->get('max', null);

        return view('checkout.detail', compact('produk', 'lokasi', 'stok', 'listCart', 'cekStock', 'max', 'productId', 'choosen'));
        // dd($produk);
    }

    public function checkStock(Request $request, $id, $lokasi)
    {
        $max = DB::table('produk_tokos')->select(DB::raw('SUM(stok) as stok'))->where('produk_tokos.produk_id', '=', $id)->where('produk_tokos.toko_id', '=', $lokasi)->groupBy('produk_tokos.produk_id')->value('stok');
        $choosen = $lokasi;
        // dd($max);
        $productId = $id;
        // session(['lokasi' => $request->input('lokasi')]);
        
        return redirect()->route('detail', $productId)->with('max',$max)->with('choosen', $choosen);
        // return response()->json(['newVariable' => $max]);
        
    }

    public function checkout($products)
    {
        $pelanggan = Pelanggan::where('user_id',Auth::user()->id)->first();
        // $products = $request->input('produk', []);
        $listCart = DB::table('keranjangs as k')->select('k.id')->where('k.pelanggan_id', '=', $pelanggan->id)->whereIn('k.id', $products)->groupBy('k.toko_id')->get();
        $count = $listCart->count();
        if ($count > 1)
        {
            return redirect()->back()->with('message', 'Products must be from the same store.');
            // dd($count);
        }
        else
        {
            return redirect()->back();
        }
        // dd($listCart);
    }

    public function updateQuantity($id)
    {
        $quantity = DB::table('keranjangs')->find($id);
        $quantity->kuantitas += 1;
        $quantity->save();

        return response()->json(['success' => true, 'message' => 'Count increased successfully']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function profile(){
        $user = Auth::user();
        $pelanggan = Pelanggan::where("user_id",$user->id)->first();
        $pelanggan->email = $user->email;
        $pelanggan->role_id = $user->role_id;
        $provinceList = Province::all();
        $cityList = City::all();
        return view('pelanggan.profile.profile',compact('pelanggan','provinceList','cityList'));
        dd($pelanggan);
    }
    public function transactionHistory(){
        $user = Auth::user();
        $pelanggan = Pelanggan::where("user_id",$user->id)->first();
        $transactionList = Transaksi::where("pelanggan_id",$pelanggan->id)->get();
        return view('pelanggan.profile.transactionHIstory',compact('transactionList'));
        dd($transactionList);
    }
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $pelanggan = Pelanggan::where('user_id',$user->id)->first();
        // dd($request);
        if($pelanggan->nama != $request->input('name')){
            $pelanggan->nama = $request->input('name');
            $user->nama = $pelanggan->nama;
        }
        if($user->email != $request->input('email')){
            $user->email = $request->input('email');
        }
        if($pelanggan->no_hp != $request->input('phone')){
            $pelanggan->no_hp = $request->input('phone');
        }
        if($pelanggan->alamat != $request->input('address')){
            $pelanggan->alamat = $request->input('address');
        }
        if($pelanggan->kode_pos != $request->input('postal')){
            $pelanggan->kode_pos = $request->input('postal');
        }
        if($pelanggan->provinsi != $request->input("province")){
            $pelanggan->provinsi = $request->input('province');
        }
        if($pelanggan->kota != $request->input('kota')){
            $pelanggan->kota = $request->input('kota');
        }
        $pelanggan->update();
        return redirect()->route('customer.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }

    public function masukOrder(Request $request)
    {
        $user = Auth::user();
        $pelanggan = Pelanggan::where("user_id",$user->id)->first();
        $dompet = $pelanggan->saldo;

        $selectedItems = json_decode($request->input('produk_array'));
        $listKeranjang = [];
        $totalHarga = 0;
        
        setlocale(LC_TIME, 'id_ID');
        $today = Carbon::now('Asia/Jakarta');
        
        //cari id kota pelanggan
        $kota_tujuan = $user->pelanggans->kota;
        $kota_tujuan_id = DB::table('cities')->Where('name', $kota_tujuan)->select('city_id')->get();

        $ongkirList = [];
        foreach ($selectedItems as $item) {
            $keranjang = Keranjang::where('id', $item)->with('produk')->with('toko')->first();
            //cari id kota toko pengirim
            $kota_toko_id = DB::table('cities')->Where('name', $keranjang->toko->kota)->select('city_id')->get();

            $responseCost = Http::withHeaders([
                'key' => '9335a6b808be9ab68fb8bfa6458079c1'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $kota_toko_id[0]->city_id,
                'destination' => $kota_tujuan_id[0]->city_id,
                'weight' => 1000,
                'courier'=>'jne',
            ]);

            $ongkir = $responseCost['rajaongkir']['results'];
            $ongkirList[] = $ongkir;

            $listKeranjang[] = $keranjang;
            $totalHarga += $keranjang->produk->harga*$keranjang->kuantitas;
        }

        $totals = [];
        foreach ($ongkirList as $item) {
            $totalValues = [];
            $estimasiKirim = [];

            foreach ($item[0]['costs'] as $cost) {
                $service = $cost['service'];
                $value = $cost['cost'][0]['value'];
                
                $nilai = $cost['cost'][0]['etd'];
                $arrayNilai = explode('-', $nilai);
                $nilaiTerakhir = end($arrayNilai);

                if (isset($totalValues[$service])) {
                    $totalValues[$service] += $value;
                    foreach ($estimasiKirim as $key => $valueWaktu) {
                        if ($key == $service){
                            continue;
                        } else {
                            $tanggalSampai = $today->addDays($nilaiTerakhir); 
                            $tanggalSampai->setLocale('id');
                            $formattedDate = $tanggalSampai->formatLocalized('%d %B %Y');
                            $estimasiKirim[$service] = $formattedDate;
                        }
                    }
                } else {
                    $totalValues[$service] = $value;
                    $tanggalSampai = $today->addDays($nilaiTerakhir); 
                    $tanggalSampai->setLocale('id');
                    $formattedDate = $tanggalSampai->formatLocalized('%d %B %Y');
                    $estimasiKirim[$service] = $formattedDate;
                }
            }
            $totals[] = $totalValues;
        }

        $mergedTotals = [];
        foreach ($totals as $item) {
            foreach ($item as $service => $value) {
                if (!isset($mergedTotals[$service])) {
                    $mergedTotals[$service] = 0;
                }
                $mergedTotals[$service] += $value;
            }
        }
        
        return view('checkout.detailorder', compact('listKeranjang', 'user', 'dompet', 'totalHarga', 'estimasiKirim' ,'mergedTotals'));
    }

    public function buatOrder(Request $request)
    {
        DB::beginTransaction();
        try {
            $keranjang = $request->input('keranjang');
            $user = Auth::user();
            $pelanggan = $user->pelanggans;
            $tanggalWaktu = now();

            $totalHarga = $request->input('total_harga');
            $service = $request->input('service');

            // $dompet = $user->dompet;
            // $riwayatDompet = new RiwayatDompet();
            // $riwayatDompet->dana = $totalHarga;
            // $riwayatDompet->arus = "Keluar";
            // $riwayatDompet->validasi_topup = 1;
            // $riwayatDompet->tanggal = Carbon::now('Asia/Jakarta');
            // $riwayatDompet->dompet_id = $dompet->id;
            // $riwayatDompet->save();

            $pelanggan->saldo -= $totalHarga;
            $pelanggan->poin += $totalHarga*0.01;
            $pelanggan->save();
            //cari id kota pelanggan
            $kota_tujuan = $user->pelanggans->kota;
            $kota_tujuan_id = DB::table('cities')->Where('name', $kota_tujuan)->select('city_id')->get();

            $toko_id = Keranjang::where('id', $keranjang[0])->select('toko_id')->first();
            $transaksi = new Transaksi();
            $transaksi->kode_nota = "{$user->id}-" . $tanggalWaktu->format('YmdHis');
            $transaksi->pelanggan_id = $user->pelanggans->id;
            $transaksi->toko_id = $toko_id->toko_id;
            $transaksi->status = "Diproses";
            $transaksi->grand_total = $totalHarga;
            $transaksi->poin = $totalHarga*0.01;
            $transaksi->pengiriman = $request->input('input_metode_pengiriman');
            $transaksi->tipe_jasa_kirim = $service;
            $transaksi->save();

            $subtotal = 0;
            $biayaOngkir = 0;
            foreach ($keranjang as $keranjang_id) {
                $produk_keranjang = Keranjang::where('id', $keranjang_id)->with('toko')->first();

                $produk_toko_id = DB::table('produk_tokos')->select('id')
                                    ->where('toko_id', '=', $produk_keranjang->toko_id)
                                    ->where('produk_id', '=', $produk_keranjang->produk_id)->get();
                $produk = DB::table('produks')->where('id', '=', $produk_keranjang->produk_id)->get();

                $detailTransaksi = new DetailTransaksi();
                $detailTransaksi->transaksi_id = $transaksi->id;
                $detailTransaksi->produk_toko_id = $produk_toko_id[0]->id;
                $detailTransaksi->kuantitas = $produk_keranjang->kuantitas;
                $detailTransaksi->total = $produk[0]->harga*$produk_keranjang->kuantitas;
                $detailTransaksi->save();

                $subtotal += $produk[0]->harga*$produk_keranjang->kuantitas;
                
                //cari id kota toko pengirim
                $kota_toko_id = DB::table('cities')->Where('name', $produk_keranjang->toko->kota)->select('city_id')->get();
                //perhitungan ongkir
                $responseCost = Http::withHeaders([
                    'key' => '9335a6b808be9ab68fb8bfa6458079c1'
                ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin'=> $kota_toko_id[0]->city_id,
                    'destination' => $kota_tujuan_id[0]->city_id,
                    'weight'=> $produk[0]->berat*100,
                    'courier'=>'jne',
                ]);
                $ongkir = $responseCost['rajaongkir']['results'];

                foreach ($ongkir[0]['costs'] as $ong) {
                    if ($service == $ong['service']){
                        $biayaOngkir += $ong['cost'][0]['value'];
                    }
                }

                // $riwayatDompetVendor = new RiwayatDompet();
                // $riwayatDompetVendor->dana = $subtotal;
                // $riwayatDompetVendor->arus = "Masuk";
                // $riwayatDompetVendor->validasi_topup = 1;
                // $riwayatDompetVendor->tanggal = Carbon::now('Asia/Jakarta');
                // $riwayatDompetVendor->dompet_id = $vendorUser->dompet->id;
                // $riwayatDompetVendor->save();

                // $riwayatDompetVendorOngkir = new RiwayatDompet();
                // $riwayatDompetVendorOngkir->dana = $biayaOngkir;
                // $riwayatDompetVendorOngkir->arus = "Masuk";
                // $riwayatDompetVendorOngkir->validasi_topup = 1;
                // $riwayatDompetVendorOngkir->tanggal = Carbon::now('Asia/Jakarta');
                // $riwayatDompetVendorOngkir->dompet_id = $vendorUser->dompet->id;
                // $riwayatDompetVendorOngkir->save();

                // $vendorUser->dompet->saldo += $subtotal + $biayaOngkir;
                // $vendorUser->dompet->save();

                Keranjang::where('id', $keranjang_id)->delete();
            }

            $biayaPajak = $subtotal*0.11;
            // $table->text('keterangan')->nullable();      

            if ($transaksi->pengiriman == 'Ambil Toko') {
                $transaksi->biaya_pengiriman = 0;
            } else {
                $transaksi->biaya_pengiriman = $biayaOngkir;
            }
            $transaksi->subtotal = $subtotal;
            $transaksi->biaya_pajak = $biayaPajak;
            // $transaksi->grand_total = ;
            $transaksi->save();

            DB::commit();
            return redirect()->route('listProduct')->with('berhasil', 'Pembelian berhasil dilakukan.');
        } catch (\Exception $e) {
            DB::rollBack();
            $pesanGagal = 'Pembelian gagal. Terjadi kesalahan.';
            $pesanGagal .= ' Silakan hubungi teknisi kami untuk bantuan lebih lanjut.';

            return redirect()->route('listProduct')->with('gagal', $pesanGagal);
        }
    }
}
