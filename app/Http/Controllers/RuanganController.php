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
        $ruangans = Ruangan::all();
        return view('master.ruangan.daftarruangan', compact('ruangans'));
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
    public function create()
    {
        return view('master.ruangan.insertruangan');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
        ]);

        try {

            Ruangan::create($validatedData);

            DB::commit();

            toast('Penambahan data berhasil!', 'success');
            return redirect()->route('ruangan.create');

        } catch (\Exception $e) {
            DB::rollback();

            toast('Penambahan data gagal!', 'warning');
            return redirect()->route('ruangan.create');
        }
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
    public function edit($id)
    {
        $detailRuangan = Ruangan::where('id', $id)
            ->get();

        return view('master.ruangan.editruangan', compact('detailRuangan'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $ruangan = Ruangan::find($id);

        $validatedData = $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
        ]);

        try {

            $ruangan->update($validatedData);

            DB::commit();

            toast('Perubahan data berhasil!', 'success');
            return redirect()->route('ruangan.edit', $id);

        } catch (\Exception $e) {
            DB::rollback();

            toast('Perubahan data gagal!', 'warning');
            return redirect()->route('ruangan.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $cekRuanganProduk = Produk::where('ruangan_id', $id)
                ->first();

            if ($cekRuanganProduk == null) {

                DB::statement('SET foreign_key_checks = 0');
                Ruangan::find($id)->delete();
                DB::statement('SET foreign_key_checks = 1');

                DB::commit();

                alert()->success('Berhasil!', 'Penghapusan Data Berhasil!');
                return redirect()->route('ruangan.index');
            } else {
                alert()->error('Gagal!', 'Tidak bisa menghapus data, karena ada produk yang menggunakan ruangan ini');
                return redirect()->route('ruangan.index');
            }

        } catch (\Exception $e) {
            DB::rollback();

            // echo ($e);
            alert()->error('Yahhh..', 'Menghapus data tidak berhasil!');
            return redirect()->route('ruangan.index');
        }
    }
}
