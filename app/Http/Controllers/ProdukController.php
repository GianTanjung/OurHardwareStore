<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Produk;
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
