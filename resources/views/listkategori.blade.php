<html>
  <style>
    td, th {
      border: 1px solid black
    }
  </style>
    <body>
        <h1>Daftar Kategori:{{$code}} </h1>
        <table>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Go To Detail</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Baju</td>
            <td><a href="{{route('detailkategori', 1)}}"><button>Detail</button></a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Celana</td>
            <td><a href="{{route('detailkategori', 2)}}"><button>Detail</button></a></td>
          </tr>
        </table>
    </body>
</html>