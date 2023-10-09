@extends('layouts.conquer')

@section('content')
    <table>
        @foreach($queryBuilder as $detailtransaksi)
        <tr>
            <th>{{$detailtransaksi->produk_id}}</th>
            <th>{{$detailtransaksi->transaksi_id}}</th>
            <th>{{$detailtransaksi->kuantitas}}</th>
        </tr>
        @endforeach
    </table>    
@endsection