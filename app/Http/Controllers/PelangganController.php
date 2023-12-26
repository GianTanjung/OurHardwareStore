<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $selectedkategori = $request->input('kategori', []);
        $selectedstore = $request->input('store', []);

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

        if($request->input('kuantitas') > 0){
            $jumlah = $request->input('kuantitas');
        }else{
            $jumlah = 1;
        }
        $helper = DB::table('keranjangs')->select('*')->get()->where('pelanggan_id', '=', $pelanggan->id)->where('produk_id', '=', $id)->first();

        if($helper != null){
            DB::table('keranjangs')
                ->where('id', $helper->id)
                ->update([
                    'kuantitas' => ($helper->kuantitas + 1),
                    // Add more columns as needed
                ]);
        }else{
            $data = array('produk_id'=>$id, 'pelanggan_id'=>$pelanggan->id, 'kuantitas'=>$jumlah);
            DB::table('keranjangs')->insert($data);
        }

        // $pelanggan = 1;
        // dd($pelanggan);
        

        return redirect()->back();
    }

    public function cart()
    {
        $pelanggan = Pelanggan::where('user_id',Auth::user()->id)->first();
        $listCart = DB::table('keranjangs as k')->select('k.id', 'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->get();
        $subTotal = DB::table('keranjangs as k')->select('p.harga', 'k.kuantitas    ')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', $pelanggan->id)->sum(DB::raw('harga * kuantitas'));
        $vat = $subTotal*20/100;
        $total = $subTotal+$vat;
        return view('checkout.cart', compact('listCart','subTotal','vat','total'));
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
        $produk = DB::table('produks as p')->select('p.*', 'pt.stok')->join('produk_tokos as pt', 'pt.produk_id', '=', 'p.id')->join('tokos as t', 't.id', '=', 'pt.toko_id')->where('p.id', '=', $id)->first();
        $lokasi = DB::table('tokos as t')->select('t.nama', 't.id')->join('produk_tokos as pt', 'pt.toko_id', '=', 't.id')->where('pt.produk_id', '=', $id)->where('pt.stok', '>', 0)->get();
        $stok = DB::table('produk_tokos')->select('stok')->where('produk_tokos.produk_id', '=', $id)->groupBy('produk_tokos.produk_id')->sum('stok');

        return view('checkout.detail', compact('produk', 'lokasi', 'stok'));
        // dd($produk);
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
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
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
