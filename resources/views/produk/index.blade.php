<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    @foreach($queryBuilder as $produk)
    <tr>
        <th>{{$produk->id}}</th>
        <th>{{$produk->nama}}</th>
        <th>{{$produk->hargaAsli}}</th>
        <th>{{$produk->hargaSpesial}}</th>
        <th>{{$produk->diskon}}</th>
        <th><img src="{{$produk->fotoProduk}}" alt=""></th>
        <!-- <th><img src="{{asset('images/'.$produk->fotoproduk)}}" alt=""></th> -->
        <th>{{$produk->ukuran}}</th>
        <th>{{$produk->stok}}</th>
        <th>{{$produk->warna}}</th>
        <th>{{$produk->tanggalMulaiHargaSpesial}}</th>
        <th>{{$produk->tanggalAkhirHargaSpesial}}</th>
        <th>{{$produk->merk_id}}</th>
    </tr>
    @endforeach
</table>
</body>
</html>