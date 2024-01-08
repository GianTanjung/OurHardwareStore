<?php

namespace App\Http\Controllers;

use App\Models\ProdukToko;
use App\Models\Toko;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $listPembelian = Pembelian::join('tokos', 'tokos.id', '=', 'nota_belis.toko_id')
            ->join('suppliers', 'suppliers.id', '=', 'nota_belis.supplier_id')
            ->select('nota_belis.*', 'tokos.nama as nama_toko', 'suppliers.nama as nama_supplier')
            ->get();

        return view('transaksi.pembelian.daftarpembelian', compact('listPembelian'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $tokos = Toko::all();
        $produks = Produk::all();

        return view('transaksi.pembelian.insertpembelian', compact('suppliers', 'tokos', 'produks'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'kode_nota' => 'required',
            'supplier_id' => 'required',
            'toko_id' => 'required',
            'tgl_pesan' => 'required',
            'tgl_terima' => 'required',
        ], [
            'kode_nota.required' => 'Wajib diisi!',
            'supplier_id.required' => 'Wajib diisi!',
            'toko_id.required' => 'Wajib diisi!',
            'tgl_pesan.required' => 'Wajib diisi!',
            'tgl_terima.required' => 'Wajib diisi!',
        ]);

        $tgl_bayar = $request->input('tgl_bayar');

        if ($tgl_bayar == null) {
            $status = "Menunggu Pembayaran";
        } else {
            $status = "Selesai";
        }

        try {

            //INPUT KE TABEL nota_belis
            $DataNotaBeli = [
                'kode_nota' => $validatedData['kode_nota'],
                'supplier_id' => $validatedData['supplier_id'],
                'toko_id' => $validatedData['toko_id'],
                'tgl_pesan' => $validatedData['tgl_pesan'],
                'tgl_terima' => $validatedData['tgl_terima'],
                'tgl_bayar' => $tgl_bayar,
                'status' => $status,
                'grand_total' => $request->input('grand_total'),
                'keterangan' => $request->input('keterangan'),
            ];

            $notaBeli = Pembelian::create($DataNotaBeli);

            $dataProduk = $request->input('dataProduk');

            foreach ($dataProduk as $data) {

                PembelianDetail::create([
                    'nota_beli_id' => $notaBeli->id,
                    'produk_id' => $data['produk_id'],
                    'harga' => $data['harga'],
                    'qty' => $data['qty'],
                    'subtotal' => $data['subtotal'],
                ]);

                //Update stok produk toko
                $stokProdukToko = ProdukToko::where('produk_id', $data['produk_id'])
                    ->value('stok');

                $stokProdukToko += $data['qty'];

                ProdukToko::where('produk_id', $data['produk_id'])
                    ->update([
                        'stok' => $stokProdukToko,
                    ]);

                //Update total_stok produk
                $totalStokProduk = Produk::where('id', $data['produk_id'])
                    ->value('total_stok');

                $totalStokProduk += $data['qty'];

                Produk::where('id', $data['produk_id'])
                    ->update([
                        'total_stok' => $totalStokProduk,
                    ]);
            }

            DB::commit();

            toast('Penambahan data berhasil!', 'success');
            return redirect()->route('pembelian.create');


        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();

            echo ($e);

            toast('Penambahan data gagal!', 'warning');
            // return redirect()->route('pembelian.create');
        }
    }

    public function show($id)
    {
        $detailPembelian = Pembelian::join('tokos', 'tokos.id', '=', 'nota_belis.toko_id')
            ->join('suppliers', 'suppliers.id', '=', 'nota_belis.supplier_id')
            ->select('nota_belis.*', 'suppliers.*', 'tokos.nama as nama_toko', 'tokos.nama as nama _toko', 'tokos.alamat as alamat_toko', 'tokos.kecamatan as kecamatan_toko', 'tokos.kota as kota_toko', 'tokos.provinsi as provinsi_toko', 'tokos.negara as negara_toko', 'tokos.kode_pos as kode_pos_toko', 'tokos.no_hp as no_hp_toko')
            ->where('nota_belis.id', $id)
            ->get();



        $rincianPembelian = PembelianDetail::join('produks', 'produks.id', '=', 'nota_beli_details.produk_id')
            ->select('nota_beli_details.*', 'nota_beli_details.harga as harga_beli', 'produks.*')
            ->where('nota_beli_details.nota_beli_id', $id)
            ->get();



        return view('transaksi.pembelian.detailpembelian', compact('detailPembelian', 'rincianPembelian'));
    }

    public function edit($id)
    {
        return view('transaksi.pembelian.editpembelian');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        // 
    }

    public function laporanpembelian()
    {
        $listPembelian = Pembelian::join('suppliers', 'suppliers.id', '=', 'nota_belis.supplier_id')
            ->join('tokos', 'tokos.id', '=', 'nota_belis.toko_id')
            ->select('nota_belis.*', 'tokos.nama as nama_toko', 'suppliers.nama as nama_supplier')
            ->orderBy('nota_belis.id', 'asc')
            ->get();


        return view('laporan.pembelian.daftarlaporanpembelian', compact('listPembelian'));
    }
}
