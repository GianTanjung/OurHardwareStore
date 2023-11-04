@extends('layouts.conquer')

@section('content')
    <table>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Harga</th>
      </tr>
        @foreach($listProduct as $product)
        <tr>
            <td>{{$product->id}}</th>
            <td>{{$product->nama}}</th>
            <td>{{$product->harga}}</th>
        </tr>
        @endforeach
    </table>    
@endsection