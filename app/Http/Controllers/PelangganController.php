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
        $listCart = DB::table('keranjangs as k')->select('p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', 1)->get();
        $subTotal = DB::table('keranjangs as k')->select('p.harga')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', 1)->sum('p.harga');
        $vat = $subTotal*20/100;
        $total = $subTotal+$vat;
        $count = DB::table('keranjangs as k')->select('p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', 1)->count();
        $kategoris = DB::table('kategoris')->select('*')->get();
        $stores = DB::table('tokos')->select('*')->get();

        return view('checkout.index',compact('listProduct', 'listCart', 'subTotal', 'vat', 'total', 'count', 'kategoris', 'stores', 'selectedkategori', 'selectedstore'));
        // dd($listCart);
    }

    public function addCart($id)
    {
        $jumlah = 1;
        // $pelanggan = Auth::user()->id;
        $pelanggan = 1;
        $data = array('produk_id'=>$id, 'pelanggan_id'=>$pelanggan, 'kuantitas'=>$jumlah);
        DB::table('keranjangs')->insert($data);

        return redirect()->back();
    }

    public function cart()
    {
        $listCart = DB::table('keranjangs as k')->select('k.id', 'p.fotoProduk', 'p.nama', 'p.harga', 'k.kuantitas')->join('produks as p', 'p.id', '=', 'k.produk_id')->where('k.pelanggan_id', '=', 1)->get();
        return view('checkout.cart', compact('listCart'));
    }

    public function deleteCart($id)
    {
        $listCart = DB::table('keranjangs')->where('id', '=', $id);
        $listCart->destroy();
        return redirect()->back();
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
