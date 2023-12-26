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
        // Publikasi
        $produk->save();
        $notif = "Success adding ".$produk->nama." to list of Product";
        return redirect()->route('produk.index')->with("status",$notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailProduk = Produk::join('merks', 'merks.id', '=', 'produks.merk_id')
            ->join('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
            ->join('sales_uoms', 'sales_uoms.id', '=', 'produks.sales_uoms_id')
            ->join('ruangans', 'ruangans.id', '=', 'produks.ruangan_id')
            ->select('produks.*', 'merks.nama as nama_merk', 'kategoris.nama as nama_kategori', 'sales_uoms.nama as nama_sales_uom', 'ruangans.nama as nama_ruangan')
            ->where('produks.id', $id)
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
        $produk = Produk::find($id);
        $listMerk = Merk::all();
        $listRuangan = Ruangan::all();
        $listKategori = Kategori::all();
        // dd($produk);
        return view('produk.edit',compact("produk","listMerk","listRuangan","listKategori"));
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
        $produk = Produk::find($request->input('input-id'));
        if($request->input("input-name") != $produk->nama){
            $produk->nama = $request->input("input-name");
        }
        if($request->input("input-description") != $produk->deskripsi){
            $produk->deskripsi = $request->input("input-description");
        }
        if($request->input("input-foto") != $produk->fotoProduk){
            $produk->fotoProduk = $request->input("input-foto");
        }
        if($request->input("input-type") != $produk->tipe){
            $produk->tipe = $request->input("input-type");
        }
        if($request->input("input-price") != $produk->harga){
            $produk->harga = $request->input("input-price");
        }
        if($request->input("input-merk") != $produk->merk_id){
            $produk->merk_id = $request->input("input-merk");
        }
        if($request->input("input-ruangan") != $produk->ruangan_id){
            $produk->ruangan_id = $request->input("input-ruangan");
        }
        if($request->input("input-kategori") != $produk->kategori_id){
            $produk->kategori_id = $request->input("input-kategori");
        }
        $produk->save();
        $notif = "Success updating ".$produk->nama." to list of Product";
        return redirect()->route('produk.index')->with("status",$notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        $notif = "Success deleting ".$produk->nama." from list of Product";
        return redirect()->route('produk.index')->with("status",$notif);
    }

    public function album(){
        $ProdukList = DB::table('produks')->get();
        return view('produk.album',compact('ProdukList'));
    }
}
