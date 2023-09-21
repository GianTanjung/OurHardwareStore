<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
</head>
<body>
<table>
    @foreach($queryBuilder as $detailtransaksi)
    <tr>
        <th>{{$detailtransaksi->produk_id}}</th>
        <th>{{$detailtransaksi->transaksi_id}}</th>
        <th>{{$detailtransaksi->kuantitas}}</th>
    </tr>
    @endforeach
</table>
</body>
</html>