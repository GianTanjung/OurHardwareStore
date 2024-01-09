<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class TransaksiController extends Controller
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

        $listPenjualan = Transaksi::join('tokos', 'tokos.id', '=', 'transaksis.toko_id')
            ->join('pelanggans', 'pelanggans.id', '=', 'transaksis.pelanggan_id')
            ->select('transaksis.*', 'tokos.nama as nama_toko', 'pelanggans.nama as nama_pelanggan')
            ->get();

        return view('transaksi.penjualan.daftarpenjualan', compact('listPenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $detailPenjualan = Transaksi::join('tokos', 'tokos.id', '=', 'transaksis.toko_id')
        ->join('pelanggans', 'pelanggans.id', '=', 'transaksis.pelanggan_id')
        ->select('transaksis.*', 'pelanggans.*', 'tokos.nama as nama_toko', 'tokos.nama as nama _toko', 'tokos.alamat as alamat_toko','tokos.kota as kota_toko','tokos.provinsi as provinsi_toko', 'tokos.negara as negara_toko','tokos.kode_pos as kode_pos_toko','tokos.no_hp as no_hp_toko')
        ->orderBy('transaksis.id', 'asc')
        ->get();

    

        $rincianPenjualan = DetailTransaksi::join('produk_tokos', 'produk_tokos.id', '=', 'detail_transaksis.produk_toko_id')
        ->join('produks', 'produks.id', '=', 'produk_tokos.produk_id')
        ->select('detail_transaksis.*', 'produks.*')
        ->where('detail_transaksis.transaksi_id', $id)
        ->get();

    // dd($rincianPenjualan);


    return view('transaksi.penjualan.detailpenjualan', compact('detailPenjualan', 'rincianPenjualan'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailPenjualan = Transaksi::join('tokos', 'tokos.id', '=', 'transaksis.toko_id')
        ->join('pelanggans', 'pelanggans.id', '=', 'transaksis.pelanggan_id')
        ->join('promos', 'promos.id', '=', 'transaksis.promo_id')
        ->select('transaksis.*', 'pelanggans.*', 'tokos.nama as nama_toko', 'tokos.nama as nama _toko', 'tokos.alamat as alamat_toko', 'tokos.kota as kota_toko', 'tokos.provinsi as provinsi_toko', 'tokos.negara as negara_toko', 'tokos.kode_pos as kode_pos_toko', 'tokos.no_hp as no_hp_toko', 'promos.*')
        ->orderBy('transaksis.id', 'asc')
        ->get();



    $rincianPenjualan = DetailTransaksi::join('produks', 'produks.id', '=', 'detail_transaksis.produk_id')
        ->select('detail_transaksis.*', 'produks.*')
        ->where('detail_transaksis.transaksi_id', $id)
        ->get();

    // dd($rincianPenjualan);


    return view('transaksi.penjualan.editpenjualan', compact('detailPenjualan', 'rincianPenjualan'));

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
    public function laporanpenjualan()
    {
        $listTransaksi = Transaksi::join('tokos', 'tokos.id', '=', 'transaksis.toko_id')
            ->join('pelanggans', 'pelanggans.id', '=', 'transaksis.pelanggan_id')
            ->select('transaksis.*', 'tokos.nama as nama_toko', 'pelanggans.nama as nama_pelanggan')
            ->orderBy('transaksis.id', 'asc')
            ->get();


        return view('laporan.daftarlaporanpenjualan', compact('listTransaksi'));
    }

    public function grafikSales()
    {
        $startDate = Carbon::now('Asia/Jakarta')->startOfMonth();
        $tglSekarang = Carbon::now('Asia/Jakarta');

        $tglSekarangOnly = $tglSekarang->format('d');

        $arraySalesSidoarjo = [];
        $arraySalesMalang = [];
        $arraySalesSurabaya = [];
        $arraySalesSidoarjo2 = [1, 2, 3, 4, 5, 6];
        $arrayWaktu = [];

        // dd($tglSekarangOnly);

        for ($i = 1; $i <= $tglSekarangOnly; $i++) {

            $arrayWaktu[] = $i;

            //  Sidoarjo
            $depoSidoarjo = Transaksi::whereBetween('tanggal_transaksi', [Carbon::now()->day($i)->startOfDay(), Carbon::now()->day($i)->endOfDay()])
                ->where('toko_id', '=', 1)
                ->count();

            $arraySalesSidoarjo[] = $depoSidoarjo;

            // Malang
            $depoMalang = Transaksi::whereBetween('tanggal_transaksi', [Carbon::now()->day($i)->startOfDay(), Carbon::now()->day($i)->endOfDay()])
                ->where('toko_id', '=', 2)
                ->count();

            $arraySalesMalang[] = $depoMalang;

            //  Surabaya
            $depoSurabaya = Transaksi::whereBetween('tanggal_transaksi', [Carbon::now()->day($i)->startOfDay(), Carbon::now()->day($i)->endOfDay()])
                ->where('toko_id', '=', 3)
                ->count();



            $arraySalesSurabaya[] = $depoSurabaya;
        }

        // dd($arrayWaktu, $arraySalesSidoarjo);

        return view('dashboard.sales', compact('arraySalesSidoarjo', 'arraySalesMalang', 'arrayWaktu', 'arraySalesSurabaya', 'tglSekarang', 'startDate'));
    }
}
