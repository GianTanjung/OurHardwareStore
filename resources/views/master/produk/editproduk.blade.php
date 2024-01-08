@extends('cork.cork')

@section('title', 'Ubah Data Produk')

@section('csseditproduk')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/tagify/tagify.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/tagify/custom-tagify.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/tagify/custom-tagify.css') }}">

<link rel="stylesheet" href="{{ asset('assets/src/assets/css/light/apps/ecommerce-create.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-create.css') }}">

<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('konteneditproduk')
@include('sweetalert::alert')

<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
            <li class="breadcrumb-item">{{ $detailProduk[0]->nama }}</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->


<div class="row mb-4 layout-spacing">
    
    <form enctype="multipart/form-data" class="row g-3" method="POST"
        action="{{ route('produk.update', $detailProduk[0]->id) }}">
        @csrf
        @method("PUT")

        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="widget-content widget-content-area ecommerce-create-section">

                <div class="row mb-4">
                    <div class="col text-center">
                        <h5>Spesifikasi Wajib</h5>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Nama Produk</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->nama }}"
                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                placeholder="Masukkan Nama Produk" autofocus>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-4">
                        <label>SKU</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->sku }}"
                                class="form-control @error('sku') is-invalid @enderror" name="sku"
                                placeholder="Masukkan SKU Produk">
                            @error('sku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Kategori</label>
                        <select class="form-select @error('subkategori_id') is-invalid @enderror" name="subkategori_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($kategoris as $kategori)

                            <option value="{{ $kategori->id }}" {{ $detailProduk[0]->kategori_id==$kategori->id ?
                                'selected' : '' }}>{{ $kategori->nama }}</option>

                            @endforeach
                        </select>
                        @error('subkategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Merk</label>
                        <select class="form-select @error('merk_id') is-invalid @enderror" name="merk_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($merks as $merk)

                            <option value="{{ $merk->id }}" {{ $detailProduk[0]->merk_id==$merk->id ?
                                'selected' : '' }}>{{ $merk->nama }}</option>

                            @endforeach
                        </select>
                        @error('merk_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Tipe Produk</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->tipe }}"
                                class="form-control @error('tipe') is-invalid @enderror" name="tipe"
                                placeholder="Masukkan Tipe Produk">
                            @error('tipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Harga</label>
                        <div class="col-sm-12 input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" value="{{ $detailProduk[0]->harga }}"
                                class="form-control @error('harga') is-invalid @enderror" name="harga"
                                placeholder="Masukkan Harga">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label>Ukuran</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->ukuran }}" class="form-control" name="ukuran"
                                placeholder="Masukkan Ukuran Produk">
                        </div>

                    </div>
                </div>
                {{-- <div class="row mb-4">
                    <div class="col">
                        <label>Ruangan</label>
                        <div class="col-sm-12">
                            <input class="form-control @error('ruangan') is-invalid @enderror" value="{{ implode(', ', array_column(json_decode($ruangans, true), 'nama')) }}"  name="ruangan" placeholder="Choose...">
                            @error('ruangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div> --}}

{{-- 
                <div class="row mb-4">
                    <div class="col text-center">
                        <h5>Spesifikasi Opsional</h5>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Warna</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->warna }}" class="form-control" name="warna"
                                placeholder="Masukkan Warna Produk">
                        </div>

                    </div>
                    <div class="col">
                        <label>Bentuk</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->bentuk }}" class="form-control" name="bentuk"
                                placeholder="Masukkan Bentuk Produk">
                        </div>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Permukaan</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->permukaan }}" class="form-control"
                                name="permukaan" placeholder="Masukkan Permukaan Produk">
                        </div>

                    </div>
                    <div class="col">
                        <label>Material</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->material }}" class="form-control"
                                name="material" placeholder="Masukkan Material Produk">
                        </div>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Finishing</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->finishing }}" class="form-control"
                                name="finishing" placeholder="Masukkan Finishing Produk">
                        </div>

                    </div>
                    <div class="col">
                        <label>Penggunaan</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->penggunaan }}" class="form-control"
                                name="penggunaan" placeholder="Masukkan Penggunaan Produk">
                        </div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col">
                        <label>Ukuran</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->ukuran }}" class="form-control" name="ukuran"
                                placeholder="Masukkan Ukuran Produk">
                        </div>

                    </div>
                    <div class="col">
                        <label>Volume</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->volume }}" class="form-control" name="volume"
                                placeholder="Masukkan Volume Produk">
                        </div>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Harga Spesial</label>
                        <div class="col-sm-12 input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" value="{{ $detailProduk[0]->harga_spesial }}" class="form-control"
                                name="harga_spesial" placeholder="Masukkan Harga Spesial">
                        </div>
                    </div>
                    <div class="col">
                        <label>Tanggal Mulai Harga
                            Spesial</label>
                        <div class="col-sm-12">
                            <input class="form-control flatpickr flatpickr-input active" id="tanggal_mulai"
                                name="tgl_mulai_harga_spesial" type="text"
                                value="{{ $detailProduk[0]->tgl_mulai_harga_spesial }}" placeholder="Masukkan Tanggal">
                        </div>
                    </div>
                    <div class="col">
                        <label>Tanggal Berakhir Harga
                            Spesial</label>
                        <div class="col-sm-12">
                            <input class="form-control flatpickr flatpickr-input active" id="tanggal_selesai"
                                name="tgl_selesai_harga_spesial" type="text"
                                value="{{ $detailProduk[0]->tgl_selesai_harga_spesial }}"
                                placeholder="Masukkan Tanggal">
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            value="{{ $detailProduk[0]->deskripsi }}" rows="8" placeholder="Masukkan Deskripsi Produk"
                            name="deskripsi"></textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div> --}}

                <div class="row mb-4">
                    <div class="col">
                        <label>Upload Foto</label>
                        <div class="multiple-file-upload">
                            <input type="file" name="foto_produk" class="form-control @error('foto_produk') is-invalid @enderror">
                            @error('foto_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0 mt-4">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        {{-- <div class="row mb-4">
                            <div class="col-sm-12">
                                <div class="switch form-switch-custom switch-inline form-switch-primary mt-4">
                                    <label class="switch-label" for="showPublicly">Display Publik</label>
                                    @if ( $detailProduk[0]->publikasi == "Ya")
                                    <input class="switch-input" type="checkbox" value="Ya" name="publikasi" checked>
                                    @else
                                    <input class="switch-input" type="checkbox" name="publikasi">
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-danger w-100">Reset</button>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('jseditproduk')

<script src="{{ asset('assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/tagify/tagify.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>

<script>
    var ruangans = @json($ruangans);

    var names = ruangans.map(function(ruangan) {
    return ruangan.nama;
    });

    console.log(names);

    var input = document.querySelector('input[name=ruangan]');
    
    new Tagify(input, {
    whitelist: names,
    userInput: false
    })
</script>

<script>
var dateMulai = document.querySelector('#tanggal_mulai');
var defaultDateMulai = dateMulai.value;

var dateSelesai = document.querySelector('#tanggal_selesai');
var defaultDateSelesai = dateSelesai.value;

var tglMulai = flatpickr(document.getElementById('tanggal_mulai'), {
    // dateFormat: "d-m-Y",
    defaultDate: defaultDateMulai
});
var tglSelesai = flatpickr(document.getElementById('tanggal_selesai'), {
    // dateFormat: "d-m-Y",
    defaultDate: defaultDateSelesai
});

</script>

@endsection