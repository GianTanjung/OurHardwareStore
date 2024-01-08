<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubKategoriController extends Controller
{
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        

        $subkategoris = SubKategori::join('kategoris', 'kategoris.id', '=', 'subkategoris.kategori_id')
            ->select('subkategoris.*', 'kategoris.nama as nama_kategori')
            ->get();
        return view('master.subkategori.daftarsubkategori', compact('subkategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('master.subkategori.insertsubkategori', compact('kategoris'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
            'kategori_id.required' => 'Wajib diisi!',
        ]);

        try {

            SubKategori::create($validatedData);

            DB::commit();

            toast('Penambahan data berhasil!', 'success');
            return redirect()->route('subkategori.create');

        } catch (\Exception $e) {
            DB::rollback();

            toast('Penambahan data gagal!', 'warning');
            return redirect()->route('subkategori.create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $subkategoris = SubKategori::join('kategoris', 'kategoris.id', '=', 'subkategoris.kategori_id')
            ->select('subkategoris.*', 'kategoris.nama as nama_kategori', 'kategoris.id as id_kategori')
            ->where('subkategoris.id', $id)
            ->get();

        $kategoris = Kategori::all();

        return view('master.subkategori.editsubkategori', compact('subkategoris', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $subkategori = SubKategori::find($id);

        $validatedData = $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
            'kategori_id.required' => 'Wajib diisi!',
        ]);

        try {

            $subkategori->update($validatedData);

            DB::commit();

            toast('Perubahan data berhasil!', 'success');
            return redirect()->route('subkategori.edit', $id);

        } catch (\Exception $e) {
            DB::rollback();

            toast('Perubahan data gagal!', 'warning');
            return redirect()->route('subkategori.edit', $id);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $cekSubKategoriProduk = Produk::where('subkategori_id', $id)
                ->first();

            if ($cekSubKategoriProduk == null) {

                DB::statement('SET foreign_key_checks = 0');
                SubKategori::find($id)->delete();
                DB::statement('SET foreign_key_checks = 1');

                DB::commit();

                alert()->success('Berhasil!', 'Penghapusan Data Berhasil!');
                return redirect()->route('subkategori.index');
            } else {
                alert()->error('Gagal!', 'Tidak bisa menghapus data, karena ada produk yang menggunakan sub kategori ini');
                return redirect()->route('subkategori.index');
            }

        } catch (\Exception $e) {
            DB::rollback();

            // echo ($e);
            alert()->error('Yahhh..', 'Menghapus data tidak berhasil!');
            return redirect()->route('subkategori.index');
        }
    }
}
