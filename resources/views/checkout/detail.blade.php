@extends('ekka.shop')

@section('content')
<form action="{{route('addCart', $produk->id)}}" method="post" id="myForm">
    @csrf
{{-- @foreach ($produk as $p) --}}
    <!-- Sart Single product -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img single-pro-img-no-sidebar">
                                    <div class="single-product-scroll">
                                        <a class="ec-360-lbl" data-link-action="quickview" title="360 view" data-bs-toggle="modal" data-bs-target="#ec_360_view_modal">
                                            <img src={{$produk->fotoProduk}} alt="view image">
                                        </a>
                                        <div class="single-product-cover">
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src={{$produk->fotoProduk}}
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title">{{$produk->nama}}</h5>
                                        {{-- <div class="ec-single-rating-wrap">
                                            <div class="ec-single-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star-o"></i>
                                            </div>
                                        </div> --}}
                                        <div class="ec-single-desc">{{$produk->deskripsi}}</div>

                                        <div class="ec-single-sales">
                                            <div class="ec-single-sales-inner">
                                                <div class="ec-single-sales-progress">
                                                    <span class="ec-single-progress-desc">Hurry up! Left {{$stok}} in
                                                        stock</span>
                                                        <ul>
                                                            @foreach ($cekStock as $s)
                                                            <li>
                                                                {{$s->nama}} : {{$s->stok}}
                                                            </li>
                                                            @endforeach
                                                            
                                                        </ul>
                                                    {{-- <span class="ec-single-progressbar"></span> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">As low as</span>
                                                <span class="new-price">Rp {{number_format(($produk->harga) / 1, 2, '.', ',')}}</span>
                                            </div>
                                            <div class="ec-single-stoke">
                                                <span class="ec-single-ps-title">IN STOCK</span>
                                                <span class="ec-single-sku">SKU#: {{$produk->sku}}</span>
                                            </div>
                                        </div>

                                        <div class="ec-pro-variation">
                                            <div class="ec-pro-variation-inner ec-pro-variation-size">
                                                <span>Available in</span>
                                                <div class="ec-pro-variation-content">
                                                    
                                                    {{-- <ul> --}}
                                                        @foreach ($lokasi as $l)
                                                        <tr>
                                                            <td>
                                                                @if ($l->id == $choosen)
                                                                <li style="width: 130px;">
                                                                    <input class="lokasi" type="radio" name="lokasi" value="{{$l->id}}" id="lokasi{{$l->id}}" style="width: 20px; height: 20px;" onchange="checkStock({{$l->id}})" checked> {{$l->nama}}
                                                                </li>
                                                                @else
                                                                <li style="width: 130px;">
                                                                    <input class="lokasi" type="radio" name="lokasi" value="{{$l->id}}" id="lokasi{{$l->id}}" style="width: 20px; height: 20px;" onchange="checkStock({{$l->id}})"> {{$l->nama}}
                                                                </li>
                                                                @endif
                                                            
                                                            </td>
                                                        </tr>
                                                        {{-- <li style="width: 100px;"><input type="radio" style="width: 20px; height: 20px;" name="lokasi" value="{{$l->id}}">{{$l->nama}}</li>  --}}
                                                        {{-- <div class="button-radio" onclick="selectOption('option1')">{{$l->nama}}</div> --}}
                                                        @endforeach
                                                        
                                                        {{-- <li><span>8</span></li>
                                                        <li><span>9</span></li> --}}
                                                    {{-- </ul> --}}
                                                
                                                </div>
                                            </div>

                                        </div>
                                        {{-- <form action="{{route('addCart', $produk->id)}}" method="post">
                                            @csrf --}}
                                        <div class="ec-single-qty">
                                            {{-- <div class="qty-plus-minus" > --}}
                                                @if ($max)
                                                <input class="qty-input" type="number" id="kuantitas" name="kuantitas" value="1" max="{{$max}}" min="1" style="width: 100px; height: 40px; border:10px"/>
                                                
                                            {{-- </div> --}}
                                            <div class="ec-single-cart ">
                                                <button class="btn btn-primary" id="submitButton" type="submit">Add To Cart</button>
                                            </div>
                                            @endif
                                            {{-- <div class="ec-single-wishlist">
                                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                        src="{{asset('assets/images/icons/wishlist.svg')}}" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div>
                                            <div class="ec-single-quickview">
                                                <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><img
                                                        src="{{asset('assets/images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div> --}}
                                        </div>
                                    {{-- </form> --}}
                                        <div class="ec-single-social">
                                            <ul class="mb-0">
                                                <li class="list-inline-item facebook"><a href="#"><i
                                                            class="ecicon eci-facebook"></i></a></li>
                                                <li class="list-inline-item twitter"><a href="#"><i
                                                            class="ecicon eci-twitter"></i></a></li>
                                                <li class="list-inline-item instagram"><a href="#"><i
                                                            class="ecicon eci-instagram"></i></a></li>
                                                <li class="list-inline-item youtube-play"><a href="#"><i
                                                            class="ecicon eci-youtube-play"></i></a></li>
                                                <li class="list-inline-item behance"><a href="#"><i
                                                            class="ecicon eci-behance"></i></a></li>
                                                <li class="list-inline-item whatsapp"><a href="#"><i
                                                            class="ecicon eci-whatsapp"></i></a></li>
                                                <li class="list-inline-item plus"><a href="#"><i
                                                            class="ecicon eci-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <!-- product details description area end -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Single product -->
    {{-- @endforeach --}}
</form>

{{-- @push('scripts') --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Attach a change event handler to the radio buttons
                $('input[name="lokasi"]').change(function() {
                    // Enable or disable the submit button based on whether a radio button is checked
                    $('#submitButton').prop('disabled', !$('input[name="lokasi"]:checked').val());
                });
            });
            function checkStock(id){
            
            var product = @json($productId);
            console.log(product);
            window.location.href = "checkStock/"+ product + "/" + id;
            }

    //         document.addEventListener('DOMContentLoaded', function () {
    //     // Retrieve the stored value from session storage
    //     var storedValue = sessionStorage.getItem('selectedRadio');

    //     // If a value is found, set the radio button to checked
    //     if (storedValue) {
    //         var radioButton = document.querySelector('input[name="lokasi"][value="' + storedValue + '"]');
    //         if (radioButton) {
    //             radioButton.checked = true;
    //             // Enable the submit button
    //             document.getElementById('submitButton').disabled = false;
    //         }
    //     }

    //     // Add an event listener to update session storage when a radio button is clicked
    //     var radioButtons = document.querySelectorAll('input[name="lokasi"]');
    //     radioButtons.forEach(function (radioButton) {
    //         radioButton.addEventListener('click', function () {
    //             // Store the selected value in session storage
    //             sessionStorage.setItem('selectedRadio', this.value);
    //             document.getElementById('submitButton').disabled = false;
    //         });
    //     });
    // });
        </script>

{{-- @endpush --}}
@endsection

    @section('cart')
    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            <div class="ec-cart-top">
                <div class="ec-cart-title">
                    <span class="cart_title">My Cart</span>
                    <button class="ec-close">×</button>
                </div>
                <ul class="eccart-pro-items">
                    @foreach ($listCart as $c)
                    <li>
                        <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                                src={{$c->fotoProduk}} alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="product-left-sidebar.html" class="cart_pro_title">{{$c->nama}}</a>
                            <span class="cart-price"><span>{{number_format(($c->harga) / 1, 2, '.', ',')}}</span> x {{$c->kuantitas}}</span>
                            {{-- <div class="qty-plus-minus">
                                <input class="qty-input" type="text" name="ec_qtybtn" value={{$c->kuantitas}} />
                            </div> --}}
                            <a href="../deleteOutCart/{{$c->id}}" class="remove">×</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="ec-cart-bottom">
                <div class="cart_btn">
                    <a href="{{route('cart')}}" style="width: 100%" class="btn btn-primary">View Cart</a>
                </div>
            </div>
        </div>
    </div>
    @endsection


    @if(count($listCart) != 0)
    @section('cartAmount')
        <span class="ec-cart-count cart-count-lable">{{count($listCart)}}</span>
    @endsection
    @section('cartAmountHeader')
        <span class="ec-header-count cart-count-lable">{{count($listCart)}}</span>
    @endsection
@endif