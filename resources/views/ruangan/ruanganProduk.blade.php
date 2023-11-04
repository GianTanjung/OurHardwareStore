@extends('layouts.conquer')

@section('content')

<table>
    <tr>
        <th>Nama</th>
        {{-- <th>Deskripsi</th> --}}
        <th>Foto Produk</th>
        <th>Tipe</th>
        <th>Harga</th>
        <th>Merk</th>
        <th>Ruangan</th>
        <th>Kategori</th>
        <th></th>
    </tr>
    @foreach($produkList as $p)
    <tr>
        <td>{{$p->nama}}</td>
        {{-- <td>{{$p->deskripsi}}</td> --}}
        <td><img src="{{$p->fotoProduk}}" alt=""></td>
        <td>{{$p->tipe}}</td>
        <td>{{$p->harga}}</td>
        <td>{{$p->namaMerk}}</td>
        <td>{{$p->namaRuang}}</td>
        <td>{{$p->namaKategori}}</td>
        <td><a href="produk/{{$p->id}}">Detail Produk</a></td>
    </tr>
    @endforeach 


</table>
@endsection
<style>
    img{
        width: 100px;
        height: 100px;
    }
</style>