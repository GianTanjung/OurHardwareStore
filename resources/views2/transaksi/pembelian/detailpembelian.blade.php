@extends('cork.cork')

@section('title')
{{ $detailPembelian[0]->kode_nota }}
@endsection

@section('cssdetailpembelian')
{{-- <link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/light/users/user-profile.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/dark/users/user-profile.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/light/apps/ecommerce-details.css') }}" rel="stylesheet" type="text/css"> --}}

<link href="{{ asset('assets/src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css">

<style>
    .truncate-text {
        max-width: 380px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

@endsection


@section('kontendetailpembelian')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pembelian.index') }}">Pembelian</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $detailPembelian[0]->kode_nota }}</li>
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
                                                        <img class="company-logo" src="{{ asset('assets/src/assets/img/depotbangunan.png') }}"
                                                            alt="company">
                                                        <h3 class="in-heading align-self-center">Depot Bangunan</h3>
                                                    </div>
                                                    <p class="inv-street-addr mt-3">www.depotbangunan.com</p>
                                                    <p class="inv-email-address">info@depotbangunan.com</p>
                                                    <p class="inv-email-address">0812345678</p>
                                                </div>

                                                <div class="col-sm-6 text-sm-end">
                                                    <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span
                                                            class="inv-title">Invoice : </span> <span
                                                            class="inv-number">{{ $detailPembelian[0]->kode_nota }}</span></p>
                                                    <p class="inv-created-date mt-sm-5 mt-3"><span
                                                            class="inv-title">Invoice Date : </span> <span
                                                            class="inv-date">{{ $detailPembelian[0]->tgl_pesan }}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Tgl terima : </span>
                                                        <span class="inv-date">{{ $detailPembelian[0]->tgl_terima }}</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Tgl bayar : </span>
                                                            <span class="inv-date">{{ $detailPembelian[0]->tgl_bayar }}</span>
                                                        </p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="inv--detail-section inv--customer-detail-section">

                                            <div class="row">

                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                    <p class="inv-to">Invoice To</p>
                                                </div>

                                                <div
                                                    class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                    <h6 class=" inv-title">Invoice From</h6>
                                                </div>

                                                <div class="col-xl-6 col-lg-7 col-md-6 col-sm-4">
                                                    <p class="inv-customer-name">Depot Bangunan - {{ $detailPembelian[0]->nama_toko }}</p>
                                                    <p class="inv-street-addr">{{ $detailPembelian[0]->alamat_toko }}, Kec. {{ $detailPembelian[0]->kecamatan_toko }} </p>
                                                    <p class="inv-street-addr">{{ $detailPembelian[0]->kota_toko }}, {{ $detailPembelian[0]->provinsi_toko }}, {{
                                                        $detailPembelian[0]->negara_toko }}</p>
                                                    <p class="inv-email-address">({{ $detailPembelian[0]->kode_pos_toko }})</p>
                                                    <p class="inv-email-address">{{ $detailPembelian[0]->no_hp_toko }}</p>
                                                </div>
                                                
                                                <div class="col-xl-6 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">                                            
                                                    <p class="inv-customer-name">{{ $detailPembelian[0]->nama }}</p>
                                                    <p class="inv-street-addr">{{ $detailPembelian[0]->alamat }}, Kec. {{ $detailPembelian[0]->kecamatan }}</p>
                                                    <p class="inv-street-addr">{{ $detailPembelian[0]->kota }}, {{
                                                        $detailPembelian[0]->provinsi }}, {{ $detailPembelian[0]->negara }}</p>
                                                    <p class="inv-email-address">({{ $detailPembelian[0]->kode_pos }})</p>
                                                    <p class="inv-email-address">{{ $detailPembelian[0]->no_hp }}</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="inv--product-table-section">
                                            <div class="table">
                                                <table class="table">
                                                    <thead class="">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Items</th>
                                                            <th class="text-end" scope="col">Qty</th>
                                                            <th class="text-end" scope="col">Price</th>
                                                            {{-- <th class="text-end" scope="col">Disc(%)</th> --}}
                                                            <th class="text-end" scope="col">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rincianPembelian as $index=>$item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td class="truncate-text">{{ $item->nama }}</td>
                                                                <td class="text-end">{{ $item->qty }}</td>
                                                                <td class="text-end">@currency($item->harga_beli)</td>
                                                                {{-- <td class="text-end">{{ $item->diskon }}</td> --}}
                                                                <td class="text-end">@currency($item->subtotal)</td>
                                                            </tr>
                                                        @endforeach                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="inv--total-amounts">

                                            <div class="row mt-5">
                                                <div class="col text-end">
                                                    <div class="text-sm-end">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h4 class="">Grand Total : @currency($detailPembelian[0]->grand_total)</h4>
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
                                {{-- <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-send">Send Invoice</a>
                                </div> --}}
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);"
                                        class="btn btn-secondary btn-print action-print">Print</a>
                                </div>
                                {{-- <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-success btn-download">Download</a>
                                </div>
                                <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="./app-invoice-edit.html" class="btn btn-dark btn-edit">Edit</a>
                                </div> --}}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@section('jsdetailpembelian')

<script src="{{ asset('assets/src/assets/js/apps/invoice-preview.js') }}"></script>

@endsection