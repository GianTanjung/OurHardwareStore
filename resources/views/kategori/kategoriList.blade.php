@extends('layouts.conquer')

@section('content')

<table>
    <tr>
        <th>Nama</th>
        <th></th>
    </tr>
    @foreach($kategoriList as $k)
    <tr>
        <td>{{$k->nama}}</td>
        <td><a href="kategori/{{$k->id}}">Detail Produk</a></td>
    </tr>
    @endforeach
</table>
@endsection