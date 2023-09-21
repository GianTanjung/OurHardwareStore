<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
</head>
<body>
<table>
    @foreach($queryBuilder as $transaksi)
    <tr>
        <th>{{$transaksi->id}}</th>
        <th>{{$transaksi->tanggal_transaksi}}</th>
        <th>{{$transaksi->tanggal_jatuh_tempo}}</th>
        <th>{{$transaksi->tanggal_bayar}}</th>
        <th>{{$transaksi->status}}</th>
        <th>{{$transaksi->grand_total}}</th>
        <th>{{$transaksi->pengiriman}}</th>
        <th>{{$transaksi->promo_id}}</th>
        <th>{{$transaksi->pembayaran_id}}</th>
        <th>{{$transaksi->toko_id}}</th>
    </tr>
    @endforeach
</table>
</body>
</html>