<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Supplier;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $suppliers = Supplier::all();
        return view('pengaturan.supplier.daftarsupplier', compact('suppliers'));
    }

    public function create()
    {
        $provinsis = Province::all();

        return view('pengaturan.supplier.insertsupplier', compact('provinsis'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
            'no_hp.required' => 'Wajib diisi!',
            'email.required' => 'Wajib diisi!',
            'alamat.required' => 'Wajib diisi!',
            'kota.required' => 'Wajib diisi!',
            'provinsi.required' => 'Wajib diisi!',
            'kecamatan.required' => 'Wajib diisi!',
            'kode_pos.required' => 'Wajib diisi!',
        ]);

        try {

            Supplier::create([
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
            return redirect()->route('supplier.create');

        } catch (\Exception $e) {
            DB::rollback();

            echo ($e);

            toast('Penambahan data gagal!', 'warning');
            // return redirect()->route('supplier.create');
        }
    }

    public function show($id)
    {
        $detailSupplier = Supplier::where('id', $id)
            ->get();

        return view('pengaturan.supplier.detailsupplier', compact('detailSupplier'));
    }

    public function edit($id)
    {
        $suppliers = Supplier::where('id', $id)
            ->get();

        $provinsis = Province::all();

        return view('pengaturan.supplier.editsupplier', compact('suppliers', 'provinsis'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $supplier = Supplier::find($id);

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!',
            'no_hp.required' => 'Wajib diisi!',
            'email.required' => 'Wajib diisi!',
            'alamat.required' => 'Wajib diisi!',
            'kota.required' => 'Wajib diisi!',
            'provinsi.required' => 'Wajib diisi!',
            'kecamatan.required' => 'Wajib diisi!',
            'kode_pos.required' => 'Wajib diisi!',
        ]);

        try {

            $supplier->update($validatedData);

            Supplier::where('id', $id)
            ->update([
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

            toast('Perubahan data berhasil!', 'success');
            return redirect()->route('supplier.edit', $id);

        } catch (\Exception $e) {
            DB::rollback();

            toast('Perubahan data gagal!', 'warning');
            return redirect()->route('supplier.edit', $id);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $cekSupplierNotaBeli = Pembelian::where('supplier_id', $id)
                ->first();

            if ($cekSupplierNotaBeli == null) {

                DB::statement('SET foreign_key_checks = 0');
                Supplier::find($id)->delete();
                DB::statement('SET foreign_key_checks = 1');

                DB::commit();

                alert()->success('Berhasil!', 'Penghapusan Data Berhasil!');
                return redirect()->route('supplier.index');
            } else {
                alert()->error('Gagal!', 'Tidak bisa menghapus data, karena ada data supplier yang berada di data pembelian');
                return redirect()->route('supplier.index');
            }

        } catch (\Exception $e) {
            DB::rollback();

            // echo ($e);
            alert()->error('Yahhh..', 'Menghapus data tidak berhasil!');
            return redirect()->route('supplier.index');
        }
    }
}
