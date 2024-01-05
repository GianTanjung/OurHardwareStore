<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Province;
use App\Models\City;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
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

    public function addCart(Request $request, $id)
    {
        
        $user = Auth::user();
        // dd($user->id);
        $pelanggan = Pelanggan::where('user_id',$user->id)->first();

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
        // $pelanggan = Pelanggan::where('user_id',Auth::user()->id)->first();
        // $listCart = DB::table('keranjangs as k')->select('k.id', 'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas', 'k.toko_id', 't.id as idstore', 't.nama as namastore')->join('produks as p', 'p.id', '=', 'k.produk_id')->join('tokos as t', 't.id', '=', 'k.toko_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
        // $subTotal = 0;
        //     $vat = 0;
        //     $total = 0;
        // $store = DB::table('keranjangs as k')->select('t.id', 't.nama')->join('tokos as t', 't.id', '=', 'k.toko_id')->get();
        // $sidoarjo = DB::table('keranjangs')->where('keranjangs.toko_id', 1)->count();
        // $malang = DB::table('keranjangs')->where('keranjangs.toko_id', 2)->count();
        // $surabaya = DB::table('keranjangs')->where('keranjangs.toko_id', 3)->count();

        $choosen = $request->input('produk', []);
        if($choosen == null)
        {
            $pelanggan = Pelanggan::where('user_id',Auth::user()->id)->first();
            $listCart = DB::table('keranjangs as k')->select('k.id', 'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas', 'k.toko_id', 't.id as idstore', 't.nama as namastore')->join('produks as p', 'p.id', '=', 'k.produk_id')->join('tokos as t', 't.id', '=', 'k.toko_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
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
            $listCart = DB::table('keranjangs as k')->select('k.id', 'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas', 'k.toko_id', 't.id as idstore', 't.nama as namastore')->join('produks as p', 'p.id', '=', 'k.produk_id')->join('tokos as t', 't.id', '=', 'k.toko_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
            $subTotal = DB::table('keranjangs as k')->select('p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->whereIn('k.id', $choosen)->sum(DB::raw('harga * kuantitas'));
            
            $vat = $subTotal*11/100;
            $total = $subTotal+$vat; 
            
            $store = DB::table('keranjangs as k')->select('t.id', 't.nama')->join('tokos as t', 't.id', '=', 'k.toko_id')->get();
            $sidoarjo = DB::table('keranjangs')->where('keranjangs.toko_id', 1)->count();
            $malang = DB::table('keranjangs')->where('keranjangs.toko_id', 2)->count();
            $surabaya = DB::table('keranjangs')->where('keranjangs.toko_id', 3)->count();
            
            // dd($subTotal);
        }

        return view('checkout.cart', compact('listCart','subTotal','vat','total', 'store', 'sidoarjo', 'malang', 'surabaya', 'choosen'));
        // dd($coba);
    }

    public function cartHandler(Request $request)
    {
        $submitAction = $request->input('button');

        // Perform different actions based on the button clicked
        switch ($submitAction) {
            case 'delete':
                // Handle action 1
                $id = $request->input('id');
                return $this->deleteCart($id);
                break;

            case 'checkout':
                // Handle action 2
                $products = $request->input('produk', []);
                return $this->checkout($products);
                // dd($count);
                break;

            default:
                // Handle the default case or return an error
                // $products = $request->input('produk', []);
                return $this->cart($request);
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
    public function detail($id)
    {
        $user = Auth::user();
        $pelanggan = Pelanggan::where('user_id',$user->id)->first();
        $listCart = DB::table('keranjangs as k')->select('k.id','p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
        $produk = DB::table('produks as p')->select('p.*', 'pt.stok')->join('produk_tokos as pt', 'pt.produk_id', '=', 'p.id')->join('tokos as t', 't.id', '=', 'pt.toko_id')->where('p.id', '=', $id)->first();
        $lokasi = DB::table('tokos as t')->select('t.nama', 't.id')->join('produk_tokos as pt', 'pt.toko_id', '=', 't.id')->where('pt.produk_id', '=', $id)->where('pt.stok', '>', 0)->distinct('t.nama')->get();
        $stok = DB::table('produk_tokos')->select('stok')->where('produk_tokos.produk_id', '=', $id)->groupBy('produk_tokos.produk_id')->sum('stok');

        return view('checkout.detail', compact('produk', 'lokasi', 'stok', 'listCart'));
        // dd($produk);
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
}
