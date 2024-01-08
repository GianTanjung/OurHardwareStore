@extends('cork.cork')

@section('title', 'Ubah Data Toko')

@section('cssedittoko')
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/light/apps/ecommerce-create.css') }}">
<link rel="stylesheet" href="{{ asset('assets/src/assets/css/dark/apps/ecommerce-create.css') }}">
@endsection

@section('kontenedittoko')
@include('sweetalert::alert')

<!-- BREADCRUMB -->
<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('toko.index') }}">Toko</a></li>
            <li class="breadcrumb-item">{{ $detailToko[0]->nama }}</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>
</div>
<!-- /BREADCRUMB -->


<div class="row mb-4 layout-spacing">

    <form enctype="multipart/form-data" class="row g-3" method="POST"
        action="{{ route('toko.update', $detailToko[0]->id) }}">
        @csrf
        @method("PUT")

        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
        
            <div class="widget-content widget-content-area ecommerce-create-section">
        
                <div class="row mb-4">
                    <div class="col">
                        <label>Nama</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailToko[0]->nama }}"
                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                placeholder="Masukkan Nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
        
                    </div>
                </div>
        
                <div class="row mb-4">
                    <div class="col">
                        <label>No. HP</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailToko[0]->no_hp }}"
                                class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                placeholder="Masukkan Nomor HP">
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Alamat</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailToko[0]->alamat }}"
                                class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                placeholder="Masukkan Alamat">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col">
                        <label>Email</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailToko[0]->email }}"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Masukkan Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div> --}}
                </div>
        
                <div class="row mb-4">
                    
                </div>
        
                <div class="row mb-4">
                    <div class="col">
                        <label>Provinsi</label>
                        <select class="form-select @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi"
                            onchange="getKota()">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($provinsis as $provinsi)

                                <option value="{{ $provinsi->id }}" {{ $detailToko[0]->provinsi == $provinsi->name ?
                                    'selected' : '' }}>{{ $provinsi->name }}</option>

                            @endforeach
                        </select>
                        @error('provinsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Kabupaten/Kota</label>
                        <select class="form-select @error('kota') is-invalid @enderror" name="kota" id="kota">
                            @foreach($cityList as $city)
                            <option value="{{ $city->name }}" {{ $detailToko[0]->kota == $city->name ?
                                'selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('kota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
        
                <div class="row mb-4">
                    <div class="col">
                        <label>Kecamatan</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailToko[0]->kecamatan }}"
                                class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                                placeholder="Masukkan Kecamatan">
                            @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label>Kode Pos</label>
                        <div class="col-sm-12">
                            <input type="text" value="{{ $detailToko[0]->kode_pos }}"
                                class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                placeholder="Masukkan Kode Pos" id="kode_pos">
                            @error('kode_pos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- <div class="row mb-4">
                    <div class="col-sm-12">
                        <label>Keterangan</label>
                        <textarea class="form-control" value="{{ $detailToko[0]->keterangan }}" rows="5" placeholder="Masukkan Keterangan"
                            name="deskripsi"></textarea>
                    </div>
                
                </div> --}}
            </div>
        </div>

        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0 mt-4">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-danger w-100">Reset</button>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection

@section('jsedittoko')
<script src="{{ asset('assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>

<script>
    function getKota() {
    var provinceName = document.getElementById('provinsi').value;

    fetch('/getCity/' + provinceName) // Replace with your route
        .then(response => response.json())
        .then(data => {
            let citySelect = document.getElementById('kota');
            citySelect.innerHTML = ''; // Clear existing options
            
            let option = document.createElement('option');
                option.text = "Select City"; // Replace with your subcategory name field
                option.value = ""; // Replace with your subcategory ID field
                citySelect.appendChild(option);

            data.forEach(city => {
                let option = document.createElement('option');
                option.text = city.name; // Replace with your subcategory name field
                option.value = city.name; // Replace with your subcategory ID field

                citySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection