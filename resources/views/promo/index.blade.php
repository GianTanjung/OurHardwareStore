<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo</title>
</head>
<body>
<table>
    @foreach($queryBuilder as $promo)
    <tr>
        <th>{{$promo->id}}</th>
        <th>{{$promo->nama}}</th>
        <th>{{$promo->kode_promo}}</th>
        <th>{{$promo->deskripsi}}</th>
    </tr>
    @endforeach
</table>
</body>
</html>