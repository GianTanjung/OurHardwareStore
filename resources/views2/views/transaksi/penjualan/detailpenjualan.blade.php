@extends('cork.cork')

@section('title')
{{ $detailPenjualan[0]->kode_nota }}
@endsection

@section('cssdetailpenjualan')
{{--
<link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/light/users/user-profile.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/dark/users/user-profile.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/light/apps/ecommerce-details.css') }}" rel="stylesheet" type="text/css">
--}}
<style>
    .truncate-text {
        max-width: 380px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<link href="{{ asset('assets/src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css">

@endsection


@section('kontendetailpenjualan')
<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $detailPenjualan[0]->kode_nota }}</li>
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
                                                        <img class="company-logo"
                                                            src="{{ asset('assets/src/assets/img/depotbangunan.png') }}"
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
                                                            class="inv-number">{{ $detailPenjualan[0]->kode_nota
                                                            }}</span></p>
                                                    <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span
                                                            class="inv-title">Status : </span> <span
                                                            class="inv-number">{{
                                                            $detailPenjualan[0]->status }}</span></p>
                                                    <p class="inv-created-date mt-sm-5 mt-3"><span
                                                            class="inv-title">Tanggal transaksi : </span> <span
                                                            class="inv-date">{{ $detailPenjualan[0]->tanggal_transaksi
                                                            }}</span></p>
                                                    <p class="inv-due-date"><span class="inv-title">Tanggal jatuh tempo : </span>
                                                        <span class="inv-date">{{
                                                            $detailPenjualan[0]->tanggal_jatuh_tempo }}</span>
                                                    </p>
                                                    <p class="inv-due-date"><span class="inv-title">Tanggal bayar : </span>
                                                        <span class="inv-date">{{
                                                            $detailPenjualan[0]->tanggal_bayar }}</span>
                                                    </p>
                                                    <p class="inv-due-date"><span class="inv-title">Tipe pembayaran : </span>
                                                        <span class="inv-date">{{
                                                            $detailPenjualan[0]->tipe_pembayaran }}</span>
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
                                                    <p class="inv-customer-name">{{ $detailPenjualan[0]->nama }}</p>
                                                    <p class="inv-street-addr">{{ $detailPenjualan[0]->alamat }}, Kec. {{ $detailPenjualan[0]->kecamatan }}</p>
                                                    <p class="inv-street-addr">{{ $detailPenjualan[0]->kota }}, {{
                                                        $detailPenjualan[0]->provinsi }}, {{ $detailPenjualan[0]->negara
                                                        }}</p>
                                                    <p class="inv-email-address">({{ $detailPenjualan[0]->kode_pos }})
                                                    </p>
                                                    <p class="inv-email-address">{{ $detailPenjualan[0]->no_hp }}</p>
                                                </div>

                                                <div
                                                    class="col-xl-6 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                    <p class="inv-customer-name">Mitra 10 - {{
                                                        $detailPenjualan[0]->nama_toko }}</p>
                                                    <p class="inv-street-addr">{{ $detailPenjualan[0]->alamat_toko }}, Kec. {{ $detailPenjualan[0]->kecamatan_toko }}
                                                    </p>
                                                    <p class="inv-street-addr">{{ $detailPenjualan[0]->kota_toko }}, {{
                                                        $detailPenjualan[0]->provinsi_toko }}, {{
                                                        $detailPenjualan[0]->negara_toko }}</p>
                                                    <p class="inv-email-address">({{ $detailPenjualan[0]->kode_pos_toko
                                                        }})</p>
                                                    <p class="inv-email-address">{{ $detailPenjualan[0]->no_hp_toko }}
                                                    </p>
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
                                                            <th class="text-end" scope="col">Disc(%)</th>
                                                            <th class="text-end" scope="col">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rincianPenjualan as $index=>$item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td class="truncate-text">{{ $item->nama }}</td>
                                                            <td class="text-end">{{ $item->kuantitas }}</td>
                                                            <td class="text-end">@currency($item->harga)</td>
                                                            <td class="text-end">{{ $item->diskon }}</td>
                                                            <td class="text-end">@currency($item->total)</td>
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
                                                                <p class="">@currency($detailPenjualan[0]->subtotal)</p>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <p class=" discount-rate">Pengiriman ({{
                                                                    $detailPenjualan[0]->pengiriman }}):</p>
                                                            </div>
                                                            @if ($detailPenjualan[0]->pengiriman == "Ambil Toko")
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">@currency(0)</p>
                                                            </div>
                                                            @else
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">
                                                                    @currency($detailPenjualan[0]->biaya_pengiriman)</p>
                                                            </div>
                                                            @endif
                                                            
                                                            <div class="col-sm-8 col-7">
                                                                <p class="">Tax 11% :</p>
                                                            </div>
                                                            <div class="col-sm-4 col-5">
                                                                <p class="">@currency($detailPenjualan[0]->biaya_pajak)
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-8 col-7 mt-3">
                                                                <h4 class="">Grand Total : </h4>
                                                            </div>
                                                            <div class="col-sm-4 col-5 mt-3">
                                                                <h4 class="">@currency($detailPenjualan[0]->grand_total)
                                                                </h4>
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
                                        class="btn btn-secondary btn-print  action-print">Print</a>
                                </div>
                                {{-- <div class="col-xl-12 col-md-3 col-sm-6">
                                    <a href="javascript:void(0);" class="btn btn-success btn-download">Download</a>
                                </div> --}}
                                {{-- <div class="col-xl-12 col-md-3 col-sm-6">
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

@section('jsdetailpenjualan')

<script src="{{ asset('assets/src/assets/js/apps/invoice-preview.js') }}"></script>

@endsection