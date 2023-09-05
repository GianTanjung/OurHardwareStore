<html>
  <style>
    td, th {
      border: 1px solid black
    }
  </style>
    <body>
        <h1>Daftar Produk:{{$code}} </h1>
        <table>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Go To Detail</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Baju Kokoh Anti Badai</td>
            <td><a href="{{route('detailproduk', 1)}}"><button>Detail</button></a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Celana Panjang Sabar</td>
            <td><a href="{{route('detailproduk', 2)}}"><button>Detail</button></a></td>
          </tr>
        </table>
    </body>
</html>