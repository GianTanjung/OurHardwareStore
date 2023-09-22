<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryRaw = DB::select(DB::raw('select * from transaksis'));    

        $transactionId = 1; // Ganti dengan ID transaksi yang diinginkan

        $queryRaw = DB::select('SELECT * FROM transaksis WHERE id = ?', [$transactionId]);

        if (!empty($queryRaw)) {
            // Data ditemukan
            $queryRaw = $queryRaw[0];
            // Lakukan operasi lainnya di sini jika diperlukan
        } else {
            // Data tidak ditemukan
        }

        $queryRaw = DB::select(DB::raw("SELECT * FROM transaksis WHERE grandTotal > ?", [1000000]));;


        $queryBuilder = DB::table('transaksis')->get();

        // $queryBuilder = DB::table('transaksis')->where('id', 1)->first();

        // $queryBuilder = DB::table('transaksis')->where('grandTotal', '>', 1000000)->get();


        $queryModel = Transaksi::all();

        // Kondisi mencari spesifik dengan ID (PK) yang ditentukan
        $queryModel = Transaksi::find(1);

        // Dengan menggunakan try catch apabila ID yang diinginkan tidak ditemukan
        try {
            $queryModel = Transaksi::findOrFail(1);
        } catch (ModelNotFoundException $e) {
            // Penanganan jika data tidak ditemukan
        }

        // Kondisi mencari data dengan kolom dan nilai selain ID (PK)
        $queryModel = Transaksi::where('kolom', 'nilai')->get();
        $queryModel = Transaksi::where('grandTotal', '>', 10000000)->get();


        return view('transaksi.Index', compact('queryBuilder'));
        // return view('transaksi.Index', compact('queryModel'));
        // return view('transaksi.Index', compact('queryRaw'));
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
        //
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
}
