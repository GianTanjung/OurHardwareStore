@extends('layouts.conquer')

@section('content')

<table>
    <tr>
        <th>Nama</th>
        <th></th>
    </tr>
    @foreach($ruanganList as $r)
    <tr>
        <td>{{$r->nama}}</td>
        <td><a href="ruang/{{$r->id}}">Detail Produk</a></td>
    </tr>
    @endforeach
</table>
@endsection