<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Tabel Pelanggan</h2>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
        <th>Kecamatan</th>
        <th>Kota</th>
        <th>Provinsi</th>
        <th>Negara</th>
      </tr>
    </thead>
    <tbody>
    @foreach($queryBuilder as $role)
      <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->nama}}</td>
        <td>{{$role->no_hp}}</td>
        <td>{{$role->alamat}}</td>
        <td>{{$role->kode_pos}}</td>
        <td>{{$role->kecamatan}}</td>
        <td>{{$role->kota}}</td>
        <td>{{$role->provinsi}}</td>
        <td>{{$role->negara}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
