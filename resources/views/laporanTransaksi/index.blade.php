@extends('layouts.conquer')

@section('content')

    <table>
        @foreach($queryBuilder as $laporanTransaksi)
        <tr>
            <th>{{$laporanTransaksi->id}}</th>
            <th>{{$laporanTransaksi->nama}}</th>
            <th>{{$laporanTransaksi->grand_total}}</th>
        </tr>
        @endforeach
    </table>


    <p>test</p>
@endsection