@extends('layouts.conquer')

@section('content')

<table>
    <tr>
        <th>Nama</th>
        <th></th>
    </tr>
    @foreach($merkList as $m)
    <tr>
        <td>{{$m->nama}}</td>
        <td><a href="merkProduk/{{$m->id}}">Detail Produk</a></td>
    </tr>
    @endforeach
</table>
@endsection