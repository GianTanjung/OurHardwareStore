<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\Produk;
use App\Models\Ruangan;
use App\Models\Kategori;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMerk = Merk::all();

        // dd($listMerk);

        return view('merk.index',compact('listMerk'));
    }
    public function listProduk($id){
        $produkList = Produk::where('produks.merk_id',$id)
                        ->join('merks','produks.merk_id', '=','merks.id')
                        ->join('kategoris','produks.kategori_id', '=','kategoris.id')
                        ->join('ruangans','produks.ruangan_id', '=','ruangans.id')
                        ->select("produks.*","merks.nama as namaMerk","kategoris.nama as namaKategori","ruangans.nama as namaRuangan")
                        ->get();
        return view('merk.merkProduk',compact('produkList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("merk.insert");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merk = new Merk();
        $merk->nama = $request->input("input-name");
        $merk->foto_merk = $request->input("input-foto");
        $merk->save();
        $notif = "Success adding ".$merk->nama." to list of Merk";
        return redirect()->route('merk.index')->with("status",$notif);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = Merk::find($id);
        return view('merk.edit',compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $merk = Merk::find($request->input('input-id'));
        if($request->input("input-name") != $merk->nama){
            $merk->nama = $request->input("input-name");
        }
        if($request->input("input-foto") != $merk->foto_merk){
            $merk->foto_merk = $request->input("input-foto");
        }
        $merk->save();
        $notif = "Success updating ".$merk->nama." in list of Merk";
        return redirect()->route('merk.index')->with("status",$notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = Merk::find($id);
        $merk->delete();
        $notif = "Success deleting ".$merk->nama." from list of Merk";
        return redirect()->route('merk.index')->with("status",$notif);
    }
}
