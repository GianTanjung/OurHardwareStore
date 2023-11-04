<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Ruangan;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruanganList = Ruangan::all();
        return view('ruangan.ruanganList', compact('ruanganList'));
    }
    public function listProduk($id){
        $produkList = Produk::where('produks.ruangan_id',$id)
                        ->join('merks','produks.merk_id', '=','merks.id')
                        ->join('kategoris','produks.kategori_id', '=','kategoris.id')
                        ->join('ruangans','produks.ruangan_id', '=','ruangans.id')
                        ->select("produks.*","merks.nama as namaMerk","kategoris.nama as namaKategori","ruangans.nama as namaRuangan")
                        ->get();
        return view('ruangan.ruanganProduk',compact('produkList'));
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
}
