@extends('layouts.conquer')

@section('content')

<table>
    <tr>
        <th>Nama</th>
        <th>No Hp</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
        <th>Kecamatan</th>
        <th>Kota</th>
        <th>Provinsi</th>
        <th>Negara</th>
        <th></th>
    </tr>
    @foreach($pelangganList as $p)
    <tr>
        <td>{{$p->nama}}</td>
        <td>{{$p->no_hp}}</td>
        <td>{{$p->alamat}}</td>
        <td>{{$p->kode_pos}}</td>
        <td>{{$p->kecamatan}}</td>
        <td>{{$p->kota}}</td>
        <td>{{$p->provinsi}}</td>
        <td>{{$p->negara}}</td>
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