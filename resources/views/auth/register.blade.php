@extends('ekka.shop')

@section('content')
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Register</h2>
                    <h2 class="ec-title">Register New Account</h2>
                    <p class="sub-title mb-3">{{__('Come join us with making a brand new account')}}</p>
                </div>
            </div>
            <div class="ec-register-wrapper">
                <div class="ec-register-container">
                    <div class="ec-register-form">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <span class="ec-register-wrap ec-register-half">
                                <label>{{__('Name')}}</label>
                                <input type="text" name="name" placeholder="{{__('Enter name')}}" required />
                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label>{{__('Email')}}</label>
                                <input type="email" name="email" placeholder="{{__('Enter email')}}" required />
                            </span>
                            <span class="ec-register-wrap">
                                <label>{{__('Phone')}}</label>
                                <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="ex: 012-345-6789" maxlength="12" required />
                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label for="password">{{__('Password')}}</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="{{__('Enter password')}}" />
                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label for="password-confirm">{{__('Confirm Password')}}</label>
                                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{__('Re-password')}}" />
                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label>{{__('Address')}}</label>
                                <input type="text" name="address" placeholder="{{__('Enter AAdress')}}" required />
                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label>{{__('Postal Code')}}</label>
                                <input type="text" name="postal" placeholder="{{__('Enter Postal Code')}}" required />
                            </span>
                            <span class="ec-register-wrap ec-register-half" style="display: none">
                                <label>{{__('Country')}}</label>
                                <input type="text" name="country" placeholder="{{__('Enter Country')}}"  />
                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label>{{__('Provience')}}</label>
                                <span class="ec-rg-select-inner">
                                    <select id="province" name="province" class="ec-register-select" onchange="getCity()">
                                        <option selected disabled>Select Province</option>
                                        @foreach($provinceList as $province )
                                            <option value="{{ $province->id }}" {{ old('province') == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </span>                            </span>
                            <span class="ec-register-wrap ec-register-half">
                                <label>{{__('City')}}</label>
                                <span class="ec-rg-select-inner">
                                    <select id="city" name="city" class="ec-register-select">
                                        <option selected disabled>Select City</option>
                                        {{-- @foreach($listCity as $city)
                                            <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </span>
                            </span>
                            <span class="ec-register-wrap ec-register-half" style="display: none">
                                <label>{{__('Subdistrict')}}</label>
                                <input type="text" name="subdistrict" placeholder="{{__('Enter Subdistrict')}}"  />
                            </span>
                            <span class="ec-register-wrap ec-register-btn">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Output session data to the browser console
    var sessionData = @json(session()->all());
    console.log('Session Data:', sessionData);
</script>
<script>
    function getCity() {
    var provinceID = document.getElementById('province').value;
    fetch('/getCity/' + provinceID) // Replace with your route
        .then(response => response.json())
        .then(data => {
            let citySelect = document.getElementById('city');
            citySelect.innerHTML = ''; // Clear existing options
            
            let option = document.createElement('option');
                option.text = "Select City"; // Replace with your subcategory name field
                option.value = ""; // Replace with your subcategory ID field
                citySelect.appendChild(option);

            data.forEach(city => {
                let option = document.createElement('option');
                option.text = city.name; // Replace with your subcategory name field
                option.value = city.id; // Replace with your subcategory ID field
                citySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
    }
</script>