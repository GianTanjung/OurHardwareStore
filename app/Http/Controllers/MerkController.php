<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\Produk;
use App\Models\Ruangan;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class MerkController extends Controller
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

        $merks = Merk::all();
        return view('master.merk.daftarmerk', compact('merks'));
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
        return view('master.merk.insertmerk');
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
            'foto_merk' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required' => 'Wajib diisi!',
            'foto_merk.image' => 'File harus bertipe gambar!',
            'foto_merk.mimes' => 'File harus bertipe jpeg/png/jpg!',
            'foto_merk.max' => 'File melebihi batas ukuran 2MB!',
        ]);

        try {
            if ($request->hasFile('foto_merk')) {
                $image = $request->file('foto_merk');
                $image->getClientOriginalName();
                // $imageName = time() . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
                $imageName = 'merks/' . $image->getClientOriginalName();
                // $image->storeAs('public', $imageName);       
            }

            Merk::create([
                'nama' => $validatedData['nama'],
                'foto_merk' => $imageName,
            ]);

            DB::commit();

            $image->move(public_path('uploads/merks'), $imageName);

            toast('Penambahan data berhasil!', 'success');
            return redirect()->route('merk.create');

        } catch (\Exception $e) {
            DB::rollback();

            // echo ($e);

            toast('Penambahan data gagal!', 'warning');
            return redirect()->route('merk.create');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailMerk = Merk::where('id', $id)
            ->get();

        return view('master.merk.editmerk', compact('detailMerk'));
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
            'foto_merk' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required' => 'Wajib diisi!',
            'foto_merk.image' => 'File harus bertipe gambar!',
            'foto_merk.mimes' => 'File harus bertipe jpeg/png/jpg!',
            'foto_merk.max' => 'File melebihi batas ukuran 2MB!',
        ]);

        $imageName = Merk::where('id', $id)
            ->value('foto_merk');

        $imageNameBefore = $imageName;
        $folderPath = public_path('uploads');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        $filePath = public_path('uploads/') . $imageNameBefore;

        try {

            if ($request->hasFile('foto_merk')) {
                $image = $request->file('foto_merk');
                $image->getClientOriginalName();
                $imageName = $image->getClientOriginalName();
            }

            $merk = Merk::find($id);
            $merk->update([
                'nama' => $validatedData['nama'],
                'foto_merk' => $imageName,
            ]);

            DB::commit();

            $image->move(public_path('uploads/'), $imageName);

            if (File::exists($filePath)) {

                File::delete($filePath);
            }

            toast('Perubahan data berhasil!', 'success');
            return redirect()->route('merk.edit', $id);

        } catch (\Exception $e) {
            DB::rollback();

            toast('Perubahan data gagal!', 'warning');
            return redirect()->route('merk.edit', $id);
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

            $imageName = Merk::where('id', $id)
                ->value('foto_merk');

            $filePath = public_path('uploads/') . $imageName;

            $cekMerkProduk = Produk::where('merk_id', $id)
                ->first();

            if ($cekMerkProduk == null) {

                DB::statement('SET foreign_key_checks = 0');
                Merk::find($id)->delete();
                DB::statement('SET foreign_key_checks = 1');

                DB::commit();

                if (File::exists($filePath)) {

                    File::delete($filePath);
                }

                alert()->success('Berhasil!', 'Penghapusan Data Berhasil!');
                return redirect()->route('merk.index');
            } else {
                alert()->error('Gagal!', 'Tidak bisa menghapus data, karena ada produk yang menggunakan merk ini');
                return redirect()->route('merk.index');
            }

        } catch (\Exception $e) {
            DB::rollback();

            // echo ($e);
            alert()->error('Yahhh..', 'Menghapus data tidak berhasil!');
            return redirect()->route('merk.index');
        }
    }
}
