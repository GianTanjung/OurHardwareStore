@extends('cork.cork')

@section('title', 'Tambah Data Pembelian')

@section('cssinsertpembelian')

<link rel="stylesheet" href="{{ asset('assets/src/assets/css/light/apps/ecommerce-create.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-create.css') }}">

<link href="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet"
    type="text/css">
<link href="{{ asset('assets/src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/src/assets/css/dark/apps/invoice-add.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/src/assets/css/light/apps/invoice-add.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('konteninsertpembelian')
@include('sweetalert::alert')

<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pembelian.index') }}">Pembelian</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>
</div>

<div class="row mb-4 layout-spacing">
    <form enctype="multipart/form-data" class="row g-3" method="POST" action="{{ route('pembelian.store') }}">
        @csrf
        <div class="widget-content widget-content-area ecommerce-create-section">
            <div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Kode Nota</label>
                            <input type="text" value="{{ old('kode_nota') }}" id="input-kode-nota"
                                class="form-control @error('kode_nota') is-invalid @enderror" name="kode_nota"
                                placeholder="Input Kode Nota" autofocus>
                            @error('kode_nota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>

                    <div class="col">
                        <div class="form-group mb-4">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Supplier</label>
                            <select class="form-select @error('supplier_id') is-invalid @enderror" id="input-supplier"
                                name="supplier_id">
                                <option selected disabled value="">Choose...</option>
                                @foreach ($suppliers as $supplier)

                                <option value="{{ $supplier->id }}" {{ old('supplier_id')==$supplier->id ?
                                    'selected' : '' }}>{{ $supplier->nama }}</option>

                                @endforeach
                            </select>
                            @error('supplier_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="form-group mb-4">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Toko</label>
                            <select class="form-select @error('toko_id') is-invalid @enderror" id="input-toko" name="toko_id">
                                <option selected disabled value="">Choose...</option>
                                @foreach ($tokos as $toko)
                    
                                <option value="{{ $toko->id }}" {{ old('toko_id')==$toko->id ?
                                    'selected' : '' }}>{{ $toko->nama }}</option>
                    
                                @endforeach
                            </select>
                            @error('toko_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb-4">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Tanggal Pesan</label>
                            <input
                                class="form-control flatpickr flatpickr-input active @error('tgl_pesan') is-invalid @enderror"
                                id="tanggal_pesan" name="tgl_pesan" type="text" value="{{ old('tgl_pesan') }}"
                                placeholder="Input Tanggal">
                            @error('tgl_pesan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group mb-4">
                            <label class="col-sm-12 col-form-label col-form-label-sm">Tanggal Terima</label>
                            <input
                                class="form-control flatpickr flatpickr-input active @error('tgl_terima') is-invalid @enderror"
                                id="tanggal_terima" name="tgl_terima" type="text" value="{{ old('tgl_terima') }}"
                                placeholder="Input Tanggal">
                            @error('tgl_terima')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label>Keterangan</label>
                        <textarea class="form-control" value="{{ old('keterangan') }}" id="input-keterangan" rows="4"
                            placeholder="Keterangan" name="keterangan"></textarea>
                    </div>
                </div>
            </div>

            <div class="invoice-detail-items" style="padding-top: 10px">
                <h5 class="">Detail Produk</h5>
                <div class="table-responsive">
                    <table class="table item-table kain">
                        <thead>
                            <tr>
                                <th class=""></th>
                                <th class="">Produk</th>
                                <th class="">Qty</th>
                                <th class="">Harga</th>
                                <th class="">Subtotal</th>
                            </tr>
                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="delete-item-row">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Delete"><i
                                                    data-feather="x-circle"></i></a></li>
                                    </ul>
                                </td>
                                <td>
                                    <select class="form-select" id="input-produk-0" name="dataProduk[0][produk_id]"
                                        required>
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($produks as $produk)

                                        <option value="{{ $produk->id }}" {{ old('dataProduk[0][produk_id]')==$produk->id ?
                                            'selected' : '' }}>{{ $produk->sku }} - {{ $produk->nama }}</option>

                                        @endforeach
                                    </select>
                                </td>
                                <td width="180px">
                                    <input type="text" value="{{ old('dataProduk[0][qty]') }}"
                                        id="input-qty-0" class="form-control"
                                        name="dataProduk[0][qty]" placeholder="Input Qty"
                                        onchange="handleInputSubtotal(0)" required>
                                </td>
                                <td width="200px">
                                    <input type="text" value="{{ old('dataProduk[0][harga]') }}"
                                        id="input-harga-0" class="form-control" name="dataProduk[0][harga]"
                                        placeholder="Input Harga" onchange="handleInputSubtotal(0)" dir="rtl" required>
                                </td>
                                <td width="250px">
                                    <input type="text" value="{{ old('dataProduk[0][subtotal]') }}" id="input-subtotal-0"
                                        class="form-control" name="dataProduk[0][subtotal]" dir="rtl"
                                        placeholder="Subtotal" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mb-4" style="justify-content: space-between">
                    <div class="col-sm-2">
                        <span class="btn btn-dark additem">Add Item</span>
                    </div>

                    <div class="col-sm-4" style="align-item: right">
                        <div class="row" style="justify-content: space-between">
                            <div class="col-sm-3">
                                <label>Grand Total</label>
                            </div>
                            <div class="col" style="padding-right: 33px">
                                <input class="form-control" id="input-grand-total" name="grand_total" type="text"
                                    value="{{ old('grand_total') }}" dir="rtl" placeholder="Grand Total" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="invoice-detail-note">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-danger w-100">Reset</button>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success w-100 submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>


@endsection

@section('jsinsertpembelian')

<script src="{{ asset('assets/src/plugins/src/global/vendors.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/src/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>

<script>
    function deleteItemRow() {
    deleteItem = document.querySelectorAll('.delete-item');
    for (var i = 0; i < deleteItem.length; i++) {
        deleteItem[i].addEventListener('click', function () {
            this.parentElement.parentNode.parentNode.parentNode.remove();
            })
        }
    }

    var currentIndex = 0;
    
    document.getElementsByClassName('additem')[0].addEventListener('click', function () {
    // console.log('cek add item nota')

    currentIndex++;
    
    $html = '<tr>' +
        '<td class="delete-item-row">'+
            '<ul class="table-controls">'+
                '<li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg</a></li>'+
            '</ul>'+
        '</td>'+
        '<td>'+
            '<select class="form-select" id="input-produk-'+currentIndex+'" name="dataProduk['+currentIndex+'][produk_id]" required>'+
                '<option selected disabled value="">Choose...</option>'+
                '@foreach ($produks as $produk)'+
                '<option value="{{ $produk->id }}" {{ old("dataProduk['+currentIndex+'][produk_id]") == $produk->id ? "selected" : "" }}>{{ $produk->sku }} - {{ $produk->nama }}</option>' +
                '@endforeach'+
            '</select>'+
        '</td>'+
        '<td width="180px">'+
            '<input type="text" value="{{ old("dataProduk['+currentIndex+'][qty]") }}" id="input-qty-'+currentIndex+'" class="form-control"'+
                'name="dataProduk['+currentIndex+'][qty]" placeholder="Input Qty" required>'+
        '</td>'+
        '<td width="200px">'+
            '<input type="text" value="{{ old("dataProduk['+currentIndex+'][harga]") }}" id="input-harga-'+currentIndex+'" class="form-control"'+
                'name="dataProduk['+currentIndex+'][harga]" placeholder="Input Harga"'+
                'onchange="handleInputSubtotal('+currentIndex+')" dir="rtl" required>'+
        '</td>'+
        '<td width="250px">'+
            '<input type="text" value="{{ old("dataProduk['+currentIndex+'][subtotal]") }}" id="input-subtotal-'+currentIndex+'" class="form-control"'+
                'name="dataProduk['+currentIndex+'][subtotal]" dir="rtl" placeholder="Subtotal" readonly>'+
        '</td>'+
        '</tr>';
    
        // console.log($html);
    
    $(".kain tbody").append($html);
    deleteItemRow();

    });
</script>

<script>
    var tglPesan = flatpickr(document.getElementById('tanggal_pesan'), {
    // dateFormat: "d-m-Y",
    // defaultDate: new Date()
    });
    var tglTerima = flatpickr(document.getElementById('tanggal_terima'), {
    // dateFormat: "d-m-Y",
    // defaultDate: new Date()
    });
</script>

<script>
    function handleInputSubtotal(idx) {
    // Do something with the input value
    var qty = document.getElementById("input-qty-" + idx).value
    var harga = document.getElementById("input-harga-" + idx).value
    var subtotal = harga * qty;
    document.getElementById('input-subtotal-' + idx).value = subtotal;

    var grandTotal = Number(document.getElementById('input-grand-total').value)
    var subttl = Number(document.getElementById('input-subtotal-' + idx).value)
    // console.log(grandTotal);
    var newGrandTotal = grandTotal + subttl
    document.getElementById('input-grand-total').value = newGrandTotal;
    }
</script>

@endsection