<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $kategoris = Kategori::all();
        return view('master.kategori.daftarkategori', compact('kategoris'));
    }
    public function listProduk($id){
        $produkList = Produk::where('produks.kategori_id',$id)
                        ->join('merks','produks.merk_id', '=','merks.id')
                        ->join('kategoris','produks.kategori_id', '=','kategoris.id')
                        ->join('ruangans','produks.ruangan_id', '=','ruangans.id')
                        ->select("produks.*","merks.nama as namaMerk","kategoris.nama as namaKategori","ruangans.nama as namaRuangan")
                        ->get();
                        return view('master.kategori.daftarkategori', compact('kategoris'));
                    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.kategori.insertkategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
        ]);

        try {

            Kategori::create($validatedData);

            DB::commit();

            toast('Penambahan data berhasil!', 'success');
            return redirect()->route('kategori.create');

        } catch (\Exception $e) {
            DB::rollback();

            toast('Penambahan data gagal!', 'warning');
            return redirect()->route('kategori.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = Kategori::where('id', $id)
            ->get();

        return view('master.kategori.editkategori', compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $kategori = Kategori::find($id);

        $validatedData = $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
        ]);

        try {

            $kategori->update($validatedData);

            DB::commit();

            toast('Perubahan data berhasil!', 'success');
            return redirect()->route('kategori.edit', $id);

        } catch (\Exception $e) {
            DB::rollback();

            toast('Perubahan data gagal!', 'warning');
            return redirect()->route('kategori.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $cekKategoriOnSubKategori = null;

            if ($cekKategoriOnSubKategori == null) {

                DB::statement('SET foreign_key_checks = 0');
                Kategori::find($id)->delete();
                DB::statement('SET foreign_key_checks = 1');

                DB::commit();

                alert()->success('Berhasil!', 'Penghapusan Data Berhasil!');
                return redirect()->route('kategori.index');
            } else {
                alert()->error('Gagal!', 'Tidak bisa menghapus data, karena ada sub kategori yang menggunakan kategori ini');
                return redirect()->route('kategori.index');
            }

        } catch (\Exception $e) {
            DB::rollback();

            // echo ($e);
            alert()->error('Yahhh..', 'Menghapus data tidak berhasil!');
            return redirect()->route('kategori.index');
        }
    }
}
