
<ol>
    @foreach ($tokos as $item)
    <li><b>{{$item->nama}}</b>
    <br>
{{$item->alamat}}
<br>
{{$item->no_hp}}</li>
    @endforeach
    </ol>