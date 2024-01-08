@extends('cork.cork')

@section('title', 'Ubah Data Sub Kategori')

@section('csseditsubkategori')
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

@section('konteneditsubkategori')
@include('sweetalert::alert')

<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('subkategori.index') }}">Sub Kategori</a></li>
            <li class="breadcrumb-item">{{ $subkategoris[0]->nama }}</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->


<div class="row mb-4 layout-spacing">

    <form enctype="multipart/form-data" class="row g-3" method="POST"
        action="{{ route('subkategori.update', $subkategoris[0]->id) }}">
        @csrf
        @method("PUT")

        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="widget-content widget-content-area ecommerce-create-section">
            
                <div class="row mb-4">
                    <div class="col">
                        <label>Nama Sub Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $subkategoris[0]->nama }}" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" placeholder="Masukkan Nama Sub Kategori" autofocus>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Kategori</label>
                        <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($kategoris as $kategori)

                            <option value="{{ $kategori->id }}" {{ $subkategoris[0]->id_kategori==$kategori->id ?
                                'selected' : '' }}>{{ $kategori->nama }}</option>

                            @endforeach
                        </select>
                        @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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

@section('jseditsubkategori')
<script src="{{ asset('assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>

@endsection