@extends('cork.cork')

@section('title', 'Laporan Penjualan')

@section('csslaporanpenjualan')
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css') }}">

<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css') }}">

<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css') }}">
<!-- END PAGE LEVEL STYLES -->
@endsection

@section('sidebarlaporanpenjualan')
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

    <li class="menu">
        <a href="#master" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
        <ul class="collapse submenu list-unstyled" id="master" data-bs-parent="#accordionExample">
            <li>
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

    <li class="menu active">
        <a href="#laporan" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
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
        <ul class="collapse submenu list-unstyled show" id="laporan" data-bs-parent="#accordionExample">
            <li class="active">
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

@section('kontenlaporanpenjualan')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->

<div class="row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                {{-- <div class="table-form">
                    <div class="form-group row mr-3">
                        <label for="toko" class="col-sm-3 col-form-label col-form-label-sm">Toko</label>
                        <div class="col-sm">
                            <select class="form-select" id="toko">
                                <option value="semua">Semua</option>
                                @foreach ($listToko as $datalistToko)
                                <option value="{{ $datalistToko->nama }}">{{ $datalistToko->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mr-3">
                        <label for="tipe" class="col-sm-3 col-form-label col-form-label-sm">Tipe Laporan</label>
                        <div class="col-sm">
                            <select class="form-select" id="tipe">
                                <option value="harian">Harian</option>
                                <option value="mingguan">Mingguan</option>
                                <option value="bulanan">Bulanan</option>
                                <option value="tahunan">Tahunan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mr-3">
                        <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Minimum stok:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control form-control-sm" name="min" id="min" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="max" class="col-sm-5 col-form-label col-form-label-sm">Maximum stok:</label>
                        <div class="col-sm">
                            <input type="text" class="form-control form-control-sm" name="max" id="max" placeholder="">
                        </div>
                    </div>
                </div> --}}
                <table id="html5-extension" class="table table-hover range-search" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            <th>Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanPenjualan as $datalaporanPenjualan)
                        <tr>
                            <td>{{ $datalaporanPenjualan->id }}</td>
                            <td>{{ date('d-m-Y', strtotime($datalaporanPenjualan->tanggal_transaksi)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($datalaporanPenjualan->tanggal_bayar)) }}</td>
                            <td>{{ $datalaporanPenjualan->status }}</td>
                            <td>Rp {{number_format($datalaporanPenjualan->grand_total, 0, ',', '.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('jslaporanpenjualan')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
<script src="{{ asset('assets/src/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>

<script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/custom_miscellaneous.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection