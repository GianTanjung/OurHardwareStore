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
        <th>{{$produk->deskripsi}}</th>
        <th><img src="{{$produk->fotoProduk}}" alt=""></th>
        <!-- <th><img src="{asset('images/'.$produk->fotoproduk)}" alt=""></th> -->
        <th>{{$produk->tipe}}</th>
        <th>{{$produk->harga}}</th>
        <th>{{$produk->merk_id}}</th>
        <th>{{$produk->ruangan_id}}</th>
        <th>{{$produk->kategori_id}}</th>
    </tr>
    @endforeach
</table>
</body>
</html>