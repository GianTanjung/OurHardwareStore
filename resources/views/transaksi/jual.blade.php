@extends('cork.cork')

@section('title', 'Penjualan')

@section('csstransaksijual')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/src/table/datatable/datatables.css') }}">

<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/light/table/datatable/dt-global_style.css') }}">
<link href="{{ asset('assets/src/assets/css/light/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') }}">

<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
<link href="{{ asset('assets/src/assets/css/dark/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') }}">
<!--  END CUSTOM STYLE FILE  -->
@endsection

@section('sidebartransaksijual')
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

@section('kontentransaksijual')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->

<div class="row layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <table id="style-3" class="table style-3 table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Bayar</th>
                            <th>Status</th>
                            <th>Pengiriman</th>
                            <th>Grand Total</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listTransaksiJual as $datatransaksijual)<a href="{{ route('home') }}">
                        <tr>
                            <td><a href="{{ route('detailtransaksi.jual', ['id' => $datatransaksijual->id]) }}"><span class="inv-number">#{{ $datatransaksijual->id }}</span></a></td>
                            <td>{{ date('d-m-Y', strtotime($datatransaksijual->tanggal_transaksi)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($datatransaksijual->tanggal_bayar)) }}</td>

                            <td>{{ $datatransaksijual->status}}</td>
                            <td>{{ $datatransaksijual->pengiriman}}</td>
                            <td>@currency($datatransaksijual->grand_total)</td>

                            <td class="text-center">
                                <a class="badge badge-light-primary text-start me-2 action-edit bs-tooltip"
                                    href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit" data-original-title="Edit"><i data-feather="edit-3"></i></a>
                                <a class="badge badge-light-danger text-start action-delete bs-tooltip"
                                    href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Delete" data-original-title="Delete"><i data-feather="trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jstransaksijual')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
<script src="{{ asset('assets/src/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/src/assets/js/apps/invoice-list.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c3);
</script>

@endsection