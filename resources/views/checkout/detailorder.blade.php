<!--========================================================= 
    Item Name: Ekka - Ecommerce HTML Template.
    Author: ashishmaraviya
    Version: 3.3
    Copyright 2022-2023
	Author URI: https://themeforest.net/user/ashishmaraviya
 ============================================================-->
@extends('ekka.shop')

@section('content')
    <!-- Ec checkout page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row mt-4">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Saldo</p>
                            <h5 class="font-weight-bolder">
                                Rp {{number_format($dompet, 2, ',', '.')}}
                            </h5>
                            <span id="saldo" hidden>{{$dompet}}</span>
                            <p class="mb-0">
                                <a href="/topup/order"><span class="text-success text-sm font-weight-bolder">+ ISI SALDO</span></a>
                            </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-checkout-rightside col-lg col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Summary</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                
                                <div class="ec-checkout-pro">
                                    @foreach ($listKeranjang as $keranjang)
                                    <div class="col-sm-12 mb-6">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image"
                                                            src="{{$keranjang->produk->fotoProduk}}"
                                                            alt="Produk" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">{{$keranjang->produk->nama}}</a></h5>
                                                <span class="ec-price">
                                                    <span>Harga: Rp {{number_format(($keranjang->produk->harga), 2, ',', '.')}} x {{$keranjang->kuantitas}} =&nbsp;</span>
                                                    <span class="new-price"> Rp {{number_format(($keranjang->produk->harga*$keranjang->kuantitas), 2, ',', '.')}}</span>
                                                </span>
                                                {{-- <div class="ec-pro-option">
                                                    <div class="ec-pro-color">
                                                        <span class="ec-pro-opt-label">Color</span>
                                                        <ul class="ec-opt-swatch ec-change-img">
                                                            <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                    data-src="assets/images/product-image/1_1.jpg"
                                                                    data-src-hover="assets/images/product-image/1_1.jpg"
                                                                    data-tooltip="Gray"><span
                                                                        style="background-color:#6d4c36;"></span></a>
                                                            </li>
                                                            <li><a href="#" class="ec-opt-clr-img"
                                                                    data-src="assets/images/product-image/1_2.jpg"
                                                                    data-src-hover="assets/images/product-image/1_2.jpg"
                                                                    data-tooltip="Orange"><span
                                                                        style="background-color:#ffb0e1;"></span></a>
                                                            </li>
                                                            <li><a href="#" class="ec-opt-clr-img"
                                                                    data-src="assets/images/product-image/1_3.jpg"
                                                                    data-src-hover="assets/images/product-image/1_3.jpg"
                                                                    data-tooltip="Green"><span
                                                                        style="background-color:#8beeff;"></span></a>
                                                            </li>
                                                            <li><a href="#" class="ec-opt-clr-img"
                                                                    data-src="assets/images/product-image/1_4.jpg"
                                                                    data-src-hover="assets/images/product-image/1_4.jpg"
                                                                    data-tooltip="Sky Blue"><span
                                                                        style="background-color:#74f8d1;"></span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="ec-checkout-summary">
                                    <div>
                                        <span class="text-left">Sub-Total Produk</span>
                                        <span class="text-right">Rp {{number_format($totalHarga, 2, ',', '.')}}</span>
                                    </div>
                                    <div>
                                        <span class="text-left">PPN (Pajak Pertambahan Nilai) 11%</span>
                                        <span class="text-right">Rp {{number_format(($totalHarga*0.11), 2, ',', '.')}}</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Ongkos Kirim</span>
                                        <span class="text-right" id="ongkir-pelanggan">Rp 0,00</span>
                                    </div>
                                    <div class="ec-checkout-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right total-harga">Rp {{number_format(($totalHarga*1.11), 2, ',', '.')}}</span>
                                        <span id="total-harga-hidden" hidden>{{$totalHarga*1.11}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="ec-sidebar-wrap ec-checkout-del-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Metode Pengiriman</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <div class="ec-checkout-del">
                                    <div class="ec-del-desc">Mohon pilih metode pengiriman.</div>
                                    <form action="#">
                                        <div class="ec-checkout-rightside row">
                                            <div class="col-sm-6 mb-6">
                                                <input id="rdoToko" type="radio" name="metode_pengiriman" value="Ambil Toko" checked>
                                                <span  class="font-weight-bold" style="margin-left: 18rem">Ambil Toko</span>
                                            </div>
                                            <div class="col-sm-6 mb-6">
                                                <input id="rdoRumah" type="radio" name="metode_pengiriman" value="Antar Di tempat">
                                                <span  class="font-weight-bold" style="margin-left: 17rem">Antar Di tempat</span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                        <div class="ec-sidebar-block" style="display:none;" id="divJasaKirim">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Jasa Kirim (JNE)</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <div class="ec-checkout-del">
                                    <div class="ec-del-desc">Mohon pilih salah satu jasa kirim yang diinginkan.</div>
                                    <form action="#">
                                        <div class="ec-checkout-rightside row">
                                            @foreach($mergedTotals as $key => $value)
                                            <div class="col-sm-6 mb-6">
                                                <input class="ongkir-radio" type="radio" name="ongkir" value="{{ $value }}" data-key="{{ $key }}">
                                                <span id="service" class="font-weight-bold ml-10">{{$key}}</span>
                                                <label>(Rp {{number_format(($value), 2, ',', '.')}})</label>
                                                @foreach ($estimasiKirim as $keyEst => $est)
                                                    @if ( $keyEst == $key )
                                                    <span class="text-xs font-weight-bold ml-10">&nbsp&nbspEstimasi sampai: {{$est}}</span>
                                                    @endif
                                                @endforeach
                                            </div>
                                            @endforeach
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                        <span class="ec-check-order-btn">
                            <div class="card-footer p-3">
                                <form action="{{ route('buat.order') }}" method="POST" id="form-beli" style="display:flex; flex-direction: column; align-items: center; justify-content: center">
                                    @csrf
                                    @foreach($listKeranjang as $keranjang)
                                    <input type="hidden" name="keranjang[]" value="{{ $keranjang->id }}">
                                    @endforeach
                                    <input type="hidden" name="total_harga" value="{{$totalHarga}}">
                                    <input type="hidden" name="total_ongkir" value="">
                                    <input type="hidden" name="input_metode_pengiriman" value="Ambil Toko">
                                    <input type="hidden" name="service" value="">
                                    <div>
                                        <a id="beli-button" class="btn btn-primary">Place Order</a>
                                    </div>
                                    <div>
                                        <p id="saldo-message" style="color: red;"></p>
                                    </div>
                                </form>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="konfirmasi-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin melanjutkan pembelian?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn" id="konfirmasi-button">Ya, Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const formBeli = document.getElementById('form-beli');
        const saldoElement = document.getElementById('saldo');
        const totalHargaElement = document.getElementById('total-harga-hidden');
        const beliButton = document.getElementById('beli-button');
        const saldoMessage = document.getElementById('saldo-message');
        const konfirmasiButton = document.getElementById('konfirmasi-button');
        const serviceOngkir = document.getElementById('service');

        var rdoRumah = document.getElementById('rdoRumah');
        var rdoToko = document.getElementById('rdoToko');
        var divJasaKirim = document.getElementById('divJasaKirim');

        beliButton.addEventListener('click', function () {
            const saldo = parseFloat(saldoElement.innerText);
            const totalHarga = parseFloat(totalHargaElement.innerText);
            
            var selectedRadioButton = document.querySelector('input[name="ongkir"]:checked');

            if (rdoRumah.checked) {
                if (!selectedRadioButton) {
                    saldoMessage.textContent = 'Metode pengiriman belum dipilih.';
                } else if (saldo >= totalHarga) {
                    $('#konfirmasi-modal').modal('show');
                } else {
                    saldoMessage.textContent = 'Saldo tidak mencukupi, silakan isi saldo terlebih dahulu.';
                }
            } else if (rdoToko.checked) {
                if (saldo >= totalHarga) {
                    $('#konfirmasi-modal').modal('show');
                } else {
                    saldoMessage.textContent = 'Saldo tidak mencukupi, silakan isi saldo terlebih dahulu.';
                }
            }
        });

        konfirmasiButton.addEventListener('click', function () {
            $('#konfirmasi-modal').modal('hide');
            formBeli.submit();
        });

        document.addEventListener('DOMContentLoaded', function () {
            var ongkirRadios = document.querySelectorAll('.ongkir-radio');

            ongkirRadios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    var key = radio.getAttribute('data-key');
                    // alert("Service Ongkir Hidden: " + key);
                    
                    var inputServiceOngkir = document.querySelector('input[name="service"]');
                    inputServiceOngkir.value = key;
                });
            });

            rdoRumah.addEventListener('change', function () {
                if (rdoRumah.checked) {
                    var inputMetodePengiriman = document.querySelector('input[name="input_metode_pengiriman"]');
                    inputMetodePengiriman.value = "Antar Di tempat";
                    divJasaKirim.style.display = 'block';
                }
            });

            rdoToko.addEventListener('change', function () {
                if (rdoToko.checked) {
                    var inputMetodePengiriman = document.querySelector('input[name="input_metode_pengiriman"]');
                    inputMetodePengiriman.value = "Ambil Toko";
                    divJasaKirim.style.display = 'none';
                }
            });
        });

        $(document).ready(function () {
            $('input[type="radio"]').on('change', function () {
                if (rdoRumah.checked) {
                    var selectedValue = parseFloat($('input[name="ongkir"]:checked').val().replace(/[^0-9.-]+/g, ''));
                    saldoMessage.textContent = "";
                    // alert("Total Ongkir Hidden: " + selectedValue);
                    var totalHarga = parseFloat($('#total-harga-hidden').text().replace(/[^0-9.-]+/g, ''));
                    //tambahkan ppn dan ongkir
                    totalHarga += selectedValue;
                    // alert("Nilai yang dipilih: " + totalHarga);
                    $('.total-harga').html('Rp ' + totalHarga.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                    $('#ongkir-pelanggan').html('Rp ' + selectedValue.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                    
                    var inputTotalHarga = document.querySelector('input[name="total_harga"]');
                    var inputTotalOngkir = document.querySelector('input[name="total_ongkir"]');

                    inputTotalHarga.value = totalHarga;
                    inputTotalOngkir.value = selectedValue;
                } else if (rdoToko.checked) {
                    var hargaOngkirReset = parseFloat($('input[name="ongkir"]:checked').val().replace(/[^0-9.-]+/g, ''));

                    var ongkirSaatIni = 0;
                    var totalHarga = parseFloat($('#total-harga-hidden').text().replace(/[^0-9.-]+/g, ''));

                    // alert("Nilai yang dipilih: " + totalHarga);
                    $('.total-harga').html('Rp ' + totalHarga.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                    $('#ongkir-pelanggan').html('Rp ' + ongkirSaatIni.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                    
                    var ongkirRadios = document.getElementsByName('ongkir');
                    // Mengatur properti checked menjadi false untuk setiap elemen radiobutton
                    for (var i = 0; i < ongkirRadios.length; i++) {
                        ongkirRadios[i].checked = false;
                    }

                    var inputTotalHarga = document.querySelector('input[name="total_harga"]');
                    inputTotalHarga.value = totalHarga;
                    var inputTotalOngkir = document.querySelector('input[name="total_ongkir"]');
                    inputTotalOngkir.value = 0;
                    var inputServiceOngkir = document.querySelector('input[name="service"]');
                    inputServiceOngkir.value = "";
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@endsection

