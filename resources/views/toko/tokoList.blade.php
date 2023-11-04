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
        <th></th>
    </tr>
    @foreach($tokoList as $t)
    <tr>
        <td>{{$t->nama}}</td>
        <td>{{$t->no_hp}}</td>
        <td>{{$t->alamat}}</td>
        <td>{{$t->kode_pos}}</td>
        <td>{{$t->kecamatan}}</td>
        <td>{{$t->kota}}</td>
        <td>{{$t->provinsi}}</td>
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