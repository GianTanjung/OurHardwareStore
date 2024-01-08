@extends('cork.cork')

@section('title')
{{ $detailProduk[0]->nama }}
@endsection

@section('cssdetailproduk')
<link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/light/users/user-profile.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/dark/users/user-profile.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/light/apps/ecommerce-details.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-details.css') }}" rel="stylesheet" type="text/css">

@endsection


@section('kontendetailproduk')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $detailProduk[0]->sku }} - {{
                $detailProduk[0]->nama }}</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->


<div class="row layout-spacing ">
    <!-- Area Foto -->
    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="user-profile">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Foto</h3>
                </div>
                <div class="col-xl-30 layout-top-spacing">
                    <img alt="Gbr 1" src="{{ $detailProduk[0]->fotoProduk }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Area Detail --}}
    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
        <div class="summary layout-spacing ">
            <div class="widget-content widget-content-area">
                {{-- <h3 class="">Summary</h3> --}}
                <div class="order-summary">

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>SKU Produk<span class="summary-count">{{ $detailProduk[0]->sku }} </span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Nama Produk <span class="summary-count">{{ $detailProduk[0]->nama }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Kategori<span class="summary-count">{{ $detailProduk[0]->nama_kategori
                                            }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Merk<span class="summary-count">{{ $detailProduk[0]->nama_merk
                                            }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Ruangan<span class="summary-count">{{ $detailProduk[0]->nama_ruangan
                                            }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Sales Uom<span class="summary-count">{{ $detailProduk[0]->nama_sales_uom
                                            }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Tipe<span class="summary-count">{{ $detailProduk[0]->tipe
                                            }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-list">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Merk<span class="summary-count">@currency($detailProduk[0]->harga
                                            )</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Lebar</th>
                                    <th class="text-center">Panjang</th>
                                    <th class="text-center">Tinggi</th>
                                    <th class="text-center">Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $detailProduk[0]->lebar }}</th>
                                    <td class="text-center">{{ $detailProduk[0]->panjang }}</th>
                                    <td class="text-center">{{ $detailProduk[0]->tinggi }}</th>
                                    <td class="text-center">{{ $detailProduk[0]->berat }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="summary-list summary-keterangan">
                        <div class="summery-info">
                            <div class="w-summary-details">
                                <div class="w-summary-info">
                                    <h6>Keterangan <span class="summary-count">{{ $detailProduk[0]->keterangan
                                            }}</span></h6>
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

@section('jsdetailkain')
<script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/glightbox/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/splide/splide.min.js') }}"></script>
<script src="{{ asset('assets/src/assets/js/apps/ecommerce-details.js') }}"></script>

<script src="{{ asset('assets/src/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/table/datatable/datatables.js') }}"></script>

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
            "pageLength": 10,
        });

        multiCheck(c3);
        
</script>

<script>
    $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10 
        });
</script>
@endsection