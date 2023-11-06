@extends('cork.cork')

@section('title', 'Tambah Data Produk')

@section('cssinsertproduk')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
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
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/light/apps/ecommerce-create.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-create.css') }}">
<!--  END CUSTOM STYLE FILE  -->
@endsection

@section('sidebarinsertproduk')
<ul class="list-unstyled menu-categories" id="accordionExample">

    <li class="menu">
        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="home"></i>
                <span>Dashboard</span>
            </div>
            <div>
                <i data-feather="chevron-right"></i>
                <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">
            <li>
                <a href="{{ route('dashboard.analytics') }}"> Analytics </a>
            </li>
            <li>
                <a href="{{ route('dashboard.sales') }}"> Sales </a>
            </li>
        </ul>
    </li>

    <li class="menu active">
        <a href="#master" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
            <div class="">
                <i data-feather="grid"></i>
                <span>Master</span>
            </div>
            <div>
                <i data-feather="chevron-right"></i>
                <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled show" id="master" data-bs-parent="#accordionExample">
            <li class="active">
                <a href="{{ route('produk.index') }}"> Produk </a>
            </li>
            <li>
                <a href="{{ route('merk.index') }}"> Merk </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}"> Kategori </a>
            </li>
        </ul>
    </li>

    <li class="menu">
        <a href="#transaksi" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="shopping-bag"></i>
                <span>Transaksi</span>
            </div>
            <div>
                <i data-feather="chevron-right"></i>
                <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="transaksi" data-bs-parent="#accordionExample">
            <li>
                <a href="{{ route('transaksi.jual') }}"> Penjualan </a>
            </li>
            <li>
                <a href="#"> Pembelian </a>
            </li>
        </ul>
    </li>

    <li class="menu">
        <a href="#laporan" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="file-text"></i>
                <span>Laporan</span>
            </div>
            <div>
                <i data-feather="chevron-right"></i>
                <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="laporan" data-bs-parent="#accordionExample">
            <li>
                <a href="{{ route('laporanpenjualan.index') }}"> Penjualan </a>
            </li>
        </ul>
    </li>

    <li class="menu">
        <a href="#" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="settings"></i>
                <span>Pengaturan</span>
            </div>
        </a>
    </li>
</ul>
@endsection

@section('konteninsertproduk')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->


<div class="row mb-4 layout-spacing layout-top-spacing">

    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

        <div class="widget-content widget-content-area ecommerce-create-section">

            <div class="row mb-4">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Produk">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-12">
                    <label>Keterangan</label>
                    <div id="product-description"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <label for="product-images">Upload Images</label>
                    <div class="multiple-file-upload">
                        <input type="file" class="filepond file-upload-multiple" name="filepond" id="product-images"
                            multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5">
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="switch form-switch-custom switch-inline form-switch-primary mt-4">
                        <input class="switch-input" type="checkbox" role="switch" id="showPublicly" checked>
                        <label class="switch-label" for="showPublicly">Display publicly</label>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">

        <div class="row">
            <div class="col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0 mt-4">
                <div class="widget-content widget-content-area ecommerce-create-section">
                    <div class="row">
                        <div class="col-xxl-12 mb-4">
                            <div class="switch form-switch-custom switch-inline form-switch-secondary">
                                <input class="switch-input" type="checkbox" role="switch" id="in-stock">
                                <label class="switch-label" for="in-stock">In Stock</label>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-md-6 mb-4">
                            <label for="proCode">Kode Produk</label>
                            <input type="text" class="form-control" id="proCode" value="">
                        </div>
                        <div class="col-xxl-12 col-md-6 mb-4">
                            <label for="proSKU">Product SKU</label>
                            <input type="text" class="form-control" id="proSKU" value="">
                        </div>
                        <div class="col-xxl-12 col-md-6 mb-4">
                            <label for="gender">Lokasi Rak</label>
                            <select class="form-select" id="gender">
                                <option value="">Choose...</option>
                                <option value="men">A1</option>
                                <option value="women">A2</option>
                                <option value="kids">B1</option>
                                <option value="unisex">B2</option>
                            </select>
                        </div>
                        <div class="col-xxl-12 col-md-6 mb-4">
                            <label for="category">Category</label>
                            <select class="form-select" id="category">
                                <option value="">Choose...</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="organic">Organic</option>
                                <option value="apperal">Apperal</option>
                                <option value="accessories">Accessories</option>
                            </select>
                        </div>
                        <div class="col-xxl-12 col-lg-6 col-md-12">
                            <label for="tags">Stok</label>
                            <input id="tags" class="product-tags" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-4 col-lg-4 col-md-5 mt-4">
                <div class="widget-content widget-content-area ecommerce-create-section">
                    <div class="row">
                        <div class="col-sm-12 mb-4">
                            <label for="regular-price">Regular Price</label>
                            <input type="text" class="form-control" id="regular-price" value="">
                        </div>
                        <div class="col-sm-12 mb-4">
                            <label for="sale-price">Sale Price</label>
                            <input type="text" class="form-control" id="sale-price" value="">
                        </div>
                        <div class="col-sm-12 mb-4">
                            <div class="switch form-switch-custom switch-inline form-switch-danger">
                                <input class="switch-input" type="checkbox" role="switch" id="pricing-includes-texes">
                                <label class="switch-label" for="pricing-includes-texes">Price includes taxes</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-success w-100">Add Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('jsinsertproduk')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/src/plugins/src/editors/quill/quill.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>

<script src="{{ asset('assets/src/plugins/src/tagify/tagify.min.js') }}"></script>

<script src="{{ asset('assets/src/assets/js/apps/ecommerce-create.js') }}"></script>
@endsection