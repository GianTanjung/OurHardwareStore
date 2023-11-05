@extends('cork.cork')

$id = {{ $detailTransaksiJual[0]->id }};

@section('title', 'Invoice #1')

@section('cssdetailtransaksijual')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('assets/src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
@endsection

@section('sidebardetailtransaksijual')
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

    <li class="menu active">
        <a href="#transaksi" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
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
        <ul class="collapse submenu list-unstyled show" id="transaksi" data-bs-parent="#accordionExample">
            <li class="active">
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

@section('kontendetailtransaksijual')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('transaksi.jual') }}">Transaksi Penjualan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $detailTransaksiJual[0]->id }}</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->
<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="doc-container">

            <div class="row">

                <div class="col-xl-9">

                    <div class="invoice-container">
                        <div class="invoice-inbox">

                            <div id="ct" class="">

                                <div class="invoice-00001">
                                    <div class="content-section">

                                        <div class="inv--head-section inv--detail-section">

                                            <div class="row">

                                                <div class="col-sm-6 col-12 mr-auto">
                                                    <div class="d-flex">
                                                        <img class="company-logo" src="../src/assets/img/cork-logo.png"
                                                            alt="company">
                                                        <h3 class="in-heading align-self-center">Mitra10</h3>
                                                    </div>
                                                    <p class="inv-street-addr mt-3">Jalan Kalirungkut No. 10</p>
                                                    <p class="inv-street-addr mt-1">Surabaya, Jawa Timur</p>
                                                    <p class="inv-email-address">mitra10@gmail.com</p>
                                                    <p class="inv-email-address">0812345678</p>
                                                </div>

                                                <div class="col-sm-6 text-sm-end">
                                                    <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span
                                                            class="inv-title">Invoice : </span> <span
                                                            class="inv-number">#{{ $detailTransaksiJual[0]->id }}</span></p>
                                                    <p class="inv-created-date mt-sm-5 mt-3"><span
                                                            class="inv-title">Invoice Date : </span> <span
                                                            class="inv-date">{{ $detailTransaksiJual[0]->tanggal_transaksi }}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Due Date : </span>
                                                        <span class="inv-date">{{ $detailTransaksiJual[0]->tanggal_jatuh_tempo }}</span></p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="inv--detail-section inv--customer-detail-section">

                                            <div class="row">

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                    <p class="inv-to">Invoice To</p>
                                                </div>

                                                {{-- <div
                                                    class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                    <h6 class=" inv-title">Invoice From</h6>
                                                </div> --}}

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                    <p class="inv-customer-name">Jesse Cory</p>
                                                    <p class="inv-street-addr">405 Mulberry Rd., NC, 28649</p>
                                                    <p class="inv-email-address">jcory@company.com</p>
                                                    <p class="inv-email-address">(128) 666 070</p>
                                                </div>

                                                {{-- <div
                                                    class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                    <p class="inv-customer-name">Oscar Garner</p>
                                                    <p class="inv-street-addr">2161 Ferrell Street, MN, 56545 </p>
                                                    <p class="inv-email-address">info@mail.com</p>
                                                    <p class="inv-email-address">(218) 356 9954</p>
                                                </div> --}}

                                            </div>

                                        </div>

                                        <div class="inv--product-table-section">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Items</th>
                                                            <th class="text-end" scope="col">Qty</th>
                                                            <th class="text-end" scope="col">Price</th>
                                                            <th class="text-end" scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($detailTransaksiJual as $item)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $item->nama }}</td>
                                                                <td class="text-end">{{ $item->kuantitas }}</td>
                                                                <td class="text-end">@currency($item->harga)</td>
                                                                <td class="text-end">@currency($item->kuantitas * $item->harga)</td>
                                                            </tr>
                                                        @endforeach                                               
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="inv--total-amounts">

                                            <div class="row mt-4">
                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                </div>
                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                    <div class="text-sm-end">
                                                        <div class="row">
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Sub Total :</p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">@currency($item->grand_total)</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Tax 10% :</p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">@currency($item->grand_total * 0.1)</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Shipping :</p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">@currency(20000)</p>
                                                            </div>
                                                            {{-- <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Discount 5% :</p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">@currency($item->grand_total)</p>
                                                            </div> --}}
                                                            <div class="col-sm-8 col-7 mt-3">
                                                                <h4 class="">Grand Total : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 mt-3">
                                                                <h4 class="">@currency($item->grand_total + 20000)</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="inv--note">

                                            <div class="row mt-4">
                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                    <p>Note: Thank you for doing Business with us.</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

                <div class="col-xl-3">

                    <div class="invoice-actions-btn">

                        <div class="invoice-action-btn">

                            <div class="row">
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-send">Send Invoice</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);"
                                        class="btn btn-secondary btn-print  action-print">Print</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-success btn-download">Download</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="./app-invoice-edit.html" class="btn btn-dark btn-edit">Edit</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection

@section('jsdetailtransaksijual')
<script src="{{ asset('assets/src/assets/js/apps/invoice-preview.js') }}"></script>
@endsection