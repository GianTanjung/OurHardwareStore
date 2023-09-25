<?php

namespace App\Http\Controllers;

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


        return view('laporantransaksi.Index',compact('queryBuilder'));
    }
}
