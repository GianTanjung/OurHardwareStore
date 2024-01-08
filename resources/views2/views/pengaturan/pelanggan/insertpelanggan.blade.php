@extends('cork.cork')

@section('title', 'Tambah Data Pelanggan')

@section('cssinsertpelanggan')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/tagify/tagify.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/tagify/custom-tagify.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/tagify/custom-tagify.css') }}">

<link rel="stylesheet" href="{{ asset('assets/src/assets/css/light/apps/ecommerce-create.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-create.css') }}">

@endsection

@section('konteninsertpelanggan')
@include('sweetalert::alert')

<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>
</div>


<div class="row mb-4 layout-spacing">

    <form enctype="multipart/form-data" class="row g-3" method="POST" action="{{ route('pelanggan.store') }}">
        @csrf

        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="widget-content widget-content-area ecommerce-create-section">

                <div class="row mb-4">
                    <div class="col">
                        <label>Users</label>
                        <select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($users as $user)

                            <option value="{{ $user->id }}" {{ old('user_id')==$user->id ?
                                'selected' : '' }}>{{ $user->nama }} - {{ $user->email }}</option>

                            @endforeach
                        </select>
                        @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>                   
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Nama</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" placeholder="Masukkan Nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>No. HP</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ old('no_hp') }}"
                                class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                placeholder="Masukkan Nomor HP">
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Alamat</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ old('alamat') }}"
                                class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                placeholder="Masukkan Alamat">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Provinsi</label>
                        <select class="form-select @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" onchange="getKota()">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($provinsis as $provinsi)

                            <option value="{{ $provinsi->name }}" {{ old('provinsi')==$provinsi->name ?
                                'selected' : '' }}>{{ $provinsi->name }}</option>

                            @endforeach
                        </select>
                        @error('provinsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Kabupaten/Kota</label>
                        <select class="form-select @error('kota') is-invalid @enderror" name="kota" id="kota">
                        </select>
                        @error('kota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label>Kecamatan</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ old('kecamatan') }}" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                                placeholder="Masukkan Kecamatan">
                            @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Kode Pos</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ old('kode_pos') }}" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                placeholder="Masukkan Kode Pos" id="kode_pos">
                            @error('kode_pos')
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

@section('jsinsertpelanggan')
<script src="{{ asset('assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>

<script>
    function getKota() {
    var provinceName = document.getElementById('provinsi').value;
    fetch('/getCity/' + provinceName) // Replace with your route
        .then(response => response.json())
        .then(data => {
            let citySelect = document.getElementById('kota');
            citySelect.innerHTML = ''; // Clear existing options
            
            let option = document.createElement('option');
                option.text = "Select City"; // Replace with your subcategory name field
                option.value = ""; // Replace with your subcategory ID field
                citySelect.appendChild(option);

            data.forEach(city => {
                let option = document.createElement('option');
                option.text = city.name; // Replace with your subcategory name field
                option.value = city.name; // Replace with your subcategory ID field
                citySelect.appendChild(option);

            });
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection