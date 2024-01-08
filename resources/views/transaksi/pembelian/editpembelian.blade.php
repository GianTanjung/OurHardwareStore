@extends('cork.cork')

@section('title', 'Ubah Data Pembelian')

@section('csseditpembelian')
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/filepond.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/tagify/tagify.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/light/tagify/custom-tagify.css') }}">
<link href="{{ asset('assets/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet"
    type="text/css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/css/dark/tagify/custom-tagify.css') }}">
<link href="{{ asset('assets/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css') }}" />

<link rel="stylesheet" href="{{ asset('assets/src/assets/css/light/apps/ecommerce-create.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-create.css') }}">
@endsection

@section('konteneditpembelian')
@include('sweetalert::alert')

<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->


<div class="row mb-4 layout-spacing">

    <form enctype="multipart/form-data" class="row g-3" method="POST" action="{{ route('produk.update', $detailProduk[0]->id) }}">
        @csrf
        @method("PUT")

        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="widget-content widget-content-area ecommerce-create-section">
            
                <div class="row mb-4">
                    <div class="col-4">
                        <label>SKU</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->sku }}" class="form-control @error('sku') is-invalid @enderror"
                                name="sku" placeholder="SKU Produk" autofocus>
                            @error('sku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Nama Produk</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->nama }}" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" placeholder="Nama Produk">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
            
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col">
                        <label>Kategori</label>
                        <select class="form-select @error('kategoris_id') is-invalid @enderror" name="kategoris_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($kategoris as $kategori)
                            @if ($detailProduk[0]->kategoris_id) == $kategori->id)
                            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                            @else
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('kategoris_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Merk</label>
                        <select class="form-select @error('merks_id') is-invalid @enderror" name="merks_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($merks as $merk)
                            @if ($detailProduk[0]->merks_id) == $merk->id)
                            <option value="{{ $merk->id }}" selected>{{ $merk->nama }}</option>
                            @else
                            <option value="{{ $merk->id }}">{{ $merk->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('merks_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col">
                        <label>Ruangan</label>
                        <select class="form-select @error('ruangans_id') is-invalid @enderror" name="ruangans_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($ruangans as $ruangan)
                            @if ($detailProduk[0]->ruangans_id) == $kategori->id)
                            <option value="{{ $ruangan->id }}" selected>{{ $ruangan->nama }}</option>
                            @else
                            <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('ruangans_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Sales Uom</label>
                        <select class="form-select @error('sales_uoms_id') is-invalid @enderror" name="sales_uoms_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($salesuoms as $salesuom)
                            @if ($detailProduk[0]->sales_uoms_id) == $salesuom->id)
                            <option value="{{ $salesuom->id }}" selected>{{ $salesuom->nama }}</option>
                            @else
                            <option value="{{ $salesuom->id }}">{{ $salesuom->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('sales_uoms_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col-7">
                        <label>Tipe Produk</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->tipe }}" class="form-control @error('tipe') is-invalid @enderror"
                                name="tipe" placeholder="Tipe" autofocus>
                            @error('tipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Harga</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->harga }}" class="form-control @error('harga') is-invalid @enderror"
                                name="harga" placeholder="Harga">
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
                        <label>Lebar</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->lebar }}" class="form-control @error('lebar') is-invalid @enderror"
                                name="lebar" placeholder="Lebar" autofocus>
                            @error('lebar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Panjang</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->panjang }}"
                                class="form-control @error('panjang') is-invalid @enderror" name="panjang" placeholder="Panjang">
                            @error('panjang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
            
                    </div>
                    <div class="col">
                        <label>Tinggi</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->tinggi }}"
                                class="form-control @error('tinggi') is-invalid @enderror" name="tinggi" placeholder="Tinggi">
                            @error('tinggi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
            
                    </div>
                    <div class="col">
                        <label>Berat</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailProduk[0]->berat }}" class="form-control @error('berat') is-invalid @enderror"
                                name="berat" placeholder="Berat">
                            @error('berat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
            
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" value="{{ $detailProduk[0]->deskripsi }}"
                            rows="5" placeholder="Deskripsi" name="deskripsi"></textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            
                </div>
            
                <div class="row mb-4">
                    <div class="col">
                        <label>Upload Foto</label>
                        <div class="multiple-file-upload">
                            <input type="file" name="fotoProduk" id="input-foto"
                                class="filepond file-upload-multiple @error('fotoProduk') is-invalid @enderror" allow-multiple="false"
                                allow-replace="true" max-file-size="3MB" check-validity="true">
            
                            {{-- <input type="file" class="form-control @error('input-foto') is-invalid @enderror" name="input-foto"
                                id="input-foto"> --}}
                            {{-- @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror --}}
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

@section('jseditproduk')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/src/plugins/src/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
{{-- <script src="{{ asset('assets/src/plugins/src/filepond/custom-filepond.js') }}"></script> --}}

<script src="{{ asset('assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>

<script>
    const inputElement = document.querySelector('input[id="input-foto"]');
    const pond = FilePond.create(inputElement);
    FilePond.setOptions({
        server: {
            process: '{{ route('produk.store') }}',
            revert: '{{ route('produk.store') }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        },
        // file: {
        //     type: 'image/png',
        // },
        // type: 'local',
    });
</script>
@endsection