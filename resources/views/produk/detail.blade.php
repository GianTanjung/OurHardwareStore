@extends('cork.cork')

@section('title', 'Detail Produk')

@section('cssdetailproduk')
<link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/light/users/user-profile.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/dark/users/user-profile.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/glightbox/glightbox.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/splide/splide.min.css') }}">

{{-- <link href="{{ asset('assets/src/assets/css/light/components/accordions.css') }}" rel="stylesheet" type="text/css"> --}}
{{-- <link href="{{ asset('assets/src/assets/css/dark/components/accordions.css') }}" rel="stylesheet" type="text/css"> --}}

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/components/tabs.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/light/apps/ecommerce-details.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/components/tabs.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-details.css') }}">
@endsection

@section('sidebardetailproduk')
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
@endsection

@section('kontendetailproduk')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Produk {{ $detailProduk[0]->id }}</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->

<div class="row layout-spacing ">

    <!-- Content -->
    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="user-profile">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Foto Produk</h3>
                </div>
                <div class="col-xl-30 layout-top-spacing">
                    <!-- Swiper -->
                    <div id="main-slider" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <a href="{{ $detailProduk[0]->foto_produk }}" class="glightbox">
                                        <img alt="Gbr 1" src="{{ $detailProduk[0]->fotoProduk }}">
                                    </a>
                                </li>
                                <li class="splide__slide">
                                    <a href="{{ $detailProduk[0]->foto_produk }}" class="glightbox">
                                        <img alt="Gbr 2" src="{{ $detailProduk[0]->fotoProduk }}">
                                    </a>
                                </li>
                                <li class="splide__slide">
                                    <a href="{{ $detailProduk[0]->foto_produk }}" class="glightbox">
                                        <img alt="Gbr 3" src="{{ $detailProduk[0]->fotoProduk }}">
                                    </a>
                                </li>                               
                            </ul>
                        </div>
                    </div>

                    <div id="thumbnail-slider" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide"><img alt="Gbr 1"
                                        src="{{ $detailProduk[0]->foto_produk }}"></li>
                                <li class="splide__slide"><img alt="Gbr 2"
                                        src="{{ $detailProduk[0]->foto_produk }}"></li>
                                <li class="splide__slide"><img alt="Gbr 3"
                                        src="{{ $detailProduk[0]->foto_produk }}"></li>
                            </ul>
                        </div>
                    </div>

                </div>
                {{-- <div class="text-center user-info">
                    <img src="{{ asset('assets/src/assets/img/profile-3.jpeg') }}" alt="avatar">
                </div> --}}
            </div>
        </div>
    </div>

    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="summary layout-spacing ">
            <div class="widget-content widget-content-area">
                {{-- <h3 class="">Summary</h3> --}}
                <div class="order-summary">

                    <div class="summary-list summary-id">

                        <div class="summery-info">

                            <div class="w-icon">
                                <i data-feather="shopping-bag"></i>
                            </div>

                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Id Produk <span class="summary-count">{{ $detailProduk[0]->id }} </span></h6>
                                    {{-- <p class="summary-average">90%</p> --}}
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="summary-list summary-nama">

                        <div class="summery-info">

                            <div class="w-icon">
                                <i data-feather="dollar-sign"></i>
                            </div>

                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Nama Produk <span class="summary-count">{{ $detailProduk[0]->nama }}</span></h6>
                                    {{-- <p class="summary-average">65%</p> --}}
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="summary-list summary-tipe">

                        <div class="summery-info">

                            <div class="w-icon">
                                <i data-feather="credit-card"></i>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Tipe Produk <span class="summary-count">{{ $detailProduk[0]->tipe }}</span></h6>
                                    {{-- <p class="summary-average">42%</p> --}}
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="summary-list summary-merk">

                        <div class="summery-info">

                            <div class="w-icon">
                                <i data-feather="credit-card"></i>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Merk <span class="summary-count">{{ $detailProduk[0]->merk_id }}</span></h6>
                                    {{-- <p class="summary-average">42%</p> --}}
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="summary-list summary-ruangan">

                        <div class="summery-info">

                            <div class="w-icon">
                                <i data-feather="credit-card"></i>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Ruangan <span class="summary-count">{{ $detailProduk[0]->ruangan_id }}</span></h6>
                                    {{-- <p class="summary-average">42%</p> --}}
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="summary-list summary-kategori">

                        <div class="summery-info">

                            <div class="w-icon">
                                <i data-feather="credit-card"></i>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Kategori <span class="summary-count">{{ $detailProduk[0]->kategori_id }}</span></h6>
                                    {{-- <p class="summary-average">42%</p> --}}
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="summary-list summary-harga">

                        <div class="summery-info">

                            <div class="w-icon">
                                <i data-feather="credit-card"></i>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>Harga <span class="summary-count">@currency($detailProduk[0]->harga)</span></h6>
                                    {{-- <p class="summary-average">42%</p> --}}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div>
        <div class="pro-plan layout-spacing">
            <div class="widget">

                <div class="widget-heading">

                    <div class="task-info">
                        <div class="w-title">
                            <h5>Deskripsi Produk</h5>
                            {{-- <span>$25/month</span> --}}
                        </div>
                    </div>

                    {{-- <div class="task-action">
                        <button class="btn btn-secondary">Renew Now</button>
                    </div> --}}
                </div>

                <div class="widget-content">

                    <P>{{ $detailProduk[0]->deskripsi }}</P>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@section('jsdetailproduk')
<script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>

<script src="{{ asset('assets/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/glightbox/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/splide/splide.min.js') }}"></script>
<script src="{{ asset('assets/src/assets/js/apps/ecommerce-details.js') }}"></script>
@endsection