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
  <h2>Tabel User</h2>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    @foreach($queryBuilder as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->nama}}</td>
        <td>{{$user->email}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
