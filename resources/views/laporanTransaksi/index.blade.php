<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    @foreach($queryBuilder as $laporanTransaksi)
    <tr>
        <th>{{$laporanTransaksi->id}}</th>
        <th>{{$laporanTransaksi->nama}}</th>
        <th>{{$laporanTransaksi->grand_total}}</th>
    </tr>
    @endforeach
</table>
</body>
</html>