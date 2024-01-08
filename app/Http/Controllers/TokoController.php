<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Province;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class TokoController extends Controller
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

        $tokos = Toko::all();
        return view('pengaturan.toko.daftartoko', compact('tokos'));
    }
    public function create()
    {
        $provinsis = Province::all();

        return view('pengaturan.toko.inserttoko', compact('provinsis'));
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
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
            'no_hp.required' => 'Wajib diisi!',
            'email.required' => 'Wajib diisi!',
            'alamat.required' => 'Wajib diisi!',
            'kode_pos.required' => 'Wajib diisi!',
            'kecamatan.required' => 'Wajib diisi!',
            'kota.required' => 'Wajib diisi!',
            'provinsi.required' => 'Wajib diisi!',
        ]);

        try {

            Toko::create([
                'nama' => $validatedData['nama'],
                'no_hp' => $validatedData['no_hp'],
                'alamat' => $validatedData['alamat'],
                'email' => $validatedData['email'],
                'kode_pos' => $validatedData['kode_pos'],
                'kecamatan' => $validatedData['kecamatan'],
                'kota' => $validatedData['kota'],
                'provinsi' => $validatedData['provinsi'],
                'negara' => 'Indonesia',
                'keterangan' => $request->input('keterangan'),
            ]);

            DB::commit();

            toast('Penambahan data berhasil!', 'success');
            return redirect()->route('toko.create');

        } catch (\Exception $e) {
            DB::rollback();

            toast('Penambahan data gagal!', 'warning');
            return redirect()->route('toko.create');
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
        $detailToko = Toko::where('id', $id)
        ->get();

        return view('pengaturan.toko.detailtoko', compact('detailToko'));

    }
    public function edit(Request $request, $id)
    {
        $detailToko = Toko::where('id', $id)
            ->get();
        // dd($detailToko);
        $provinsis = Province::all();

        $cityList = City::all();

        return view('pengaturan.toko.edittoko', compact('detailToko', 'provinsis', 'cityList'));
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
        DB::beginTransaction();

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            // 'email' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
            'no_hp.required' => 'Wajib diisi!',
            // 'email.required' => 'Wajib diisi!',
            'alamat.required' => 'Wajib diisi!',
            'kode_pos.required' => 'Wajib diisi!',
            'kecamatan.required' => 'Wajib diisi!',
            'kota.required' => 'Wajib diisi!',
            'provinsi.required' => 'Wajib diisi!',
        ]);

        try {

            Toko::where('id', $id)
                ->update([
                    'nama' => $validatedData['nama'],
                    'no_hp' => $validatedData['no_hp'],
                    'alamat' => $validatedData['alamat'],
                    // 'email' => $validatedData['email'],
                    'kode_pos' => $validatedData['kode_pos'],
                    'kecamatan' => $validatedData['kecamatan'],
                    'kota' => $validatedData['kota'],
                    'provinsi' => $validatedData['provinsi'],
                    'negara' => 'Indonesia',
                    // 'keterangan' => $request->input('keterangan'),
                ]);

            DB::commit();

            toast('Perubahan data berhasil!', 'success');
            return redirect()->route('toko.edit', $id);

        } catch (\Exception $e) {
            DB::rollback();

            // dd($e);

            toast('Perubahan data gagal!', 'warning');
            return redirect()->route('toko.edit', $id);
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

            $cekTokoNotaBeli = Pembelian::where('toko_id', $id)
                ->first();

            $cekTokoNotaJual = Transaksi::where('toko_id', $id)
                ->first();

            $cekStokTokoProdukToko = ProdukToko::where('toko_id', $id)
            ->value('stok');

            $cekTokoProdukToko = ProdukToko::where('toko_id', $id)
            ->first();

            // dd($cekTokoNotaBeli, $cekTokoNotaJual);

            if ($cekTokoNotaBeli == null && $cekTokoNotaJual == null) {

                if($cekTokoProdukToko == null){
                    DB::statement('SET foreign_key_checks=0;');
                    Toko::where('id', $id)->delete();
                    DB::statement('SET foreign_key_checks=1;');

                    DB::commit();
                    alert()->success('Hore!', 'Data Deleted Successfully');
                    return redirect()->route('toko.index');
                }
                else{

                    if($cekStokTokoProdukToko == 0){
                        DB::statement('SET foreign_key_checks=0;');
                        Toko::where('id', $id)->delete();
                        DB::statement('SET foreign_key_checks=1;');

                        DB::commit();
                        alert()->success('Hore!', 'Data Deleted Successfully');
                        return redirect()->route('toko.index');
                    }
                    else{
                        alert()->error('Gagal!', 'Tidak bisa menghapus data karena data toko masih terdapat produk');
                        return redirect()->route('toko.index');
                    }                  
                }
                
            }
            else{
                alert()->error('Gagal!', 'Tidak bisa menghapus data karena data toko terdapat di data lain');
                return redirect()->route('toko.index');
            }

        } catch (\Exception $e) {
            DB::rollback();

            // echo ($e);
            alert()->error('Yahhh..', 'Menghapus data tidak berhasil!');
            return redirect()->route('toko.index');
        }
    }
}
