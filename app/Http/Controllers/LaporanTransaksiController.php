<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanTransaksiController extends Controller
{
    public function index()
    {

        $queryBuilder = DB::table('transaksis')
        ->join('pelanggans','pelanggans.id','=','transaksis.pelanggan_id')
        ->select('pelanggans.id','pelanggans.nama', DB::raw('sum(transaksis.grand_total) as grand_total'))
        ->groupBy('pelanggans.id', 'pelanggans.nama')
        ->get();

        // return view('laporantransaksi.Index',compact('queryBuilder'));

        // $laporanPenjualan = Transaksi::join('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksi_id')
        // ->join('produks', 'detail_transaksis.produk_id', '=', 'produks.id')
        // ->select('detail_transaksis.*', 'transaksis.*', 'produks.nama')
        // ->orderBy('transaksis.tanggal_transaksi', 'desc')
        // ->get();

        $laporanPenjualan = Transaksi::all();

        $listToko = Toko::all();

        // dd($laporanPenjualan);

        return view('laporanpenjualan.index',compact('listToko','laporanPenjualan'));
    }
}
