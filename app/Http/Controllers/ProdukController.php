<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Produk;
use App\Models\Ruangan;
use App\Models\Kategori;

use Illuminate\Http\Request;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProduct = Merk::join('produks', 'merks.id', '=', 'produks.merk_id')
        ->select('produks.*', 'merks.nama as merk_nama')
        ->orderBy('produks.id', 'asc')
        ->get();

        // dd($listProduct);

        return view('produk.index',compact('listProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listMerk = Merk::all();
        $listRuangan = Ruangan::all();
        $listKategori = Kategori::all();
        return view('produk.insert',compact("listMerk","listRuangan","listKategori"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama = $request->input("input-name");
        $produk->deskripsi = $request->input("input-deskripsi");
        $produk->fotoProduk = $request->input("input-foto");
        $produk->tipe = $request->input("input-tipe");
        $produk->harga = $request->input("input-harga");
        $produk->merk_id = $request->input("input-merk");
        $produk->ruangan_id = $request->input("input-ruangan");
        $produk->kategori_id = $request->input("input-kategori");
        return redirect()->route('produk.idex');
        $produk->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailProduk = Produk::where('id', $id)
        ->get();

        // dd($detailProduk);

        return view('produk.detail', compact('detailProduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function album(){
        $ProdukList = DB::table('produks')->get();
        return view('produk.album',compact('ProdukList'));
    }
}
