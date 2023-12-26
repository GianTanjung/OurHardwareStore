<?php

namespace App\Http\Controllers;

use App\Models\SalesUom;
use Illuminate\Http\Request;

class SalesUomController extends Controller
{
    public function index()
    {
        $salesuoms = SalesUom::all();
        return view('master.salesuom.daftarsalesuom', compact('salesuoms'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
