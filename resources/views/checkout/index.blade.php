@extends('ekka.shop')

@section('search')
<form class="ec-btn-group-form" action="{{route('listProduct')}}" action="get">
    <input class="form-control" placeholder="Enter Your Product Name..." type="text" id="search" name="search">
    <button class="submit" type="submit"><img src="{{asset('assets/images/icons/search.svg')}}"
            class="svg_img header_svg" alt="" /></button>
</form>
@endsection

@section('content')
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                <!-- Shop Top Start -->
                <div class="ec-pro-list-top d-flex">
                    <div class="col-md-6 ec-grid-list">
                        <div class="ec-gl-btn">
                            <button class="btn btn-grid"><img src="{{asset('assets/images/icons/grid.svg')}}"
                                    class="svg_img gl_svg" alt="" /></button>
                            <button class="btn btn-list active"><img src="{{asset('assets/images/icons/list.svg')}}"
                                    class="svg_img gl_svg" alt="" /></button>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 ec-sort-select">
                        <span class="sort-by">Sort by</span>
                        <div class="ec-select-inner">
                            <select name="ec-select" id="ec-select">
                                <option selected disabled>Position</option>
                                <option value="1">Relevance</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <!-- Shop Top End -->

                <!-- Shop content Start -->
                <div class="shop-pro-content">
                    <div class="shop-pro-inner list-view">
                        <div class="row">

                            @foreach ($listProduct as $p)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content width-100">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image"
                                                    src={{$p->fotoProduk}} alt="Product" />
                                                {{-- <img class="hover-image"
                                                    src="{{asset('assets/images/product-image/6_2.jpg')}}" alt="Product" /> --}}
                                            </a>
                                            {{-- <span class="percentage">20%</span> --}}
                                            {{-- <a href="#" class="quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#ec_quickview_modal"><img
                                                    src="{{asset('assets/images/icons/quickview.svg')}}" class="svg_img pro_svg"
                                                    alt="" /></a> --}}
                                            <div class="ec-pro-actions">
                                                {{-- <a href="compare.html" class="ec-btn-group compare"
                                                    title="Compare"><img src="{{asset('assets/images/icons/compare.svg')}}"
                                                        class="svg_img pro_svg" alt="" /></a> --}}

                                                {{-- add to cart --}}
                                                {{-- <form action="{{route('addCart', $p->id)}}" method="post">
                                                @csrf
                                                <button title="Add To Cart" class=" add-to-cart"><img
                                                        src="{{asset('assets/images/icons/cart.svg')}}" class="svg_img pro_svg"
                                                        alt="" /> Add To Cart</button>
                                                </form> --}}
                                                
                                                {{-- <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                        src="{{asset('assets/images/icons/wishlist.svg')}}"
                                                        class="svg_img pro_svg" alt="" /></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href={{route('detail', $p->id)}}>{{$p->nama}}</a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </div>
                                        <div class="ec-pro-list-desc">{{$p->deskripsi}}</div>
                                        <span class="ec-price">
                                            {{-- <span class="old-price">$27.00</span> --}}
                                            <span class="new-price">Rp {{number_format(($p->harga) / 1, 2, '.', ',')}}</span>
                                        </span>
                                        {{-- <div class="ec-pro-option">
                                            <div class="ec-pro-color">
                                                <span class="ec-pro-opt-label">Color</span>
                                                <ul class="ec-opt-swatch ec-change-img">
                                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                            data-src="{{asset('assets/images/product-image/6_1.jpg')}}"
                                                            data-src-hover="{{asset('assets/images/product-image/6_1.jpg')}}"
                                                            data-tooltip="Gray"><span
                                                                style="background-color:#e8c2ff;"></span></a></li>
                                                    <li><a href="#" class="ec-opt-clr-img"
                                                            data-src="{{asset('assets/images/product-image/6_2.jpg')}}"
                                                            data-src-hover="{{asset('assets/images/product-image/6_2.jpg')}}"
                                                            data-tooltip="Orange"><span
                                                                style="background-color:#9cfdd5;"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="ec-pro-size">
                                                <span class="ec-pro-opt-label">Size</span>
                                                <ul class="ec-opt-size">
                                                    <li class="active"><a href="#" class="ec-opt-sz"
                                                            data-old="$25.00" data-new="$20.00"
                                                            data-tooltip="Small">S</a></li>
                                                    <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                            data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                    <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                            data-new="$25.00" data-tooltip="Large">X</a></li>
                                                    <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                            data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <!-- Ec Pagination Start -->
                    <div class="ec-pro-pagination">
                        <span>Showing 1-12 of 21 item(s)</span>
                        <ul class="ec-pro-pagination-inner">
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Ec Pagination End -->
                </div>
                <!--Shop content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                <div id="shop_sidebar">
                    <div class="ec-sidebar-heading">
                        <h1>Filter Products By</h1>
                    </div>
                    <div class="ec-sidebar-wrap">
                        <form action="{{route('listProduct')}}" method="get">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Category</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    @foreach ($kategoris as $k)
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" name="kategori[]" value="{{$k->id}}" onchange="this.form.submit()" @if(in_array($k->id, $selectedkategori)) checked @endif/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$k->nama}}<span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    @endforeach
            
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Size Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Stores</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    @foreach ($stores as $s)
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" name="store[]" value="{{$s->id}}" onchange="this.form.submit()" @if(in_array($s->id, $selectedstore)) checked @endif/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$s->nama}}<span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Price Block -->
                        {{-- <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Price</h3>
                            </div>
                            <div class="ec-sb-block-content es-price-slider">
                                <div class="ec-price-filter">
                                    <div id="ec-sliderPrice" class="filter__slider-price" data-min="0"
                                        data-max="250" data-step="10"></div>
                                    <div class="ec-price-input">
                                        <label class="filter__label"><input type="text"
                                                class="filter__input"></label>
                                        <span class="ec-price-divider"></span>
                                        <label class="filter__label"><input type="text"
                                                class="filter__input"></label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value={{$c->kuantitas}} />
                        </div>
                        <a href="../customer/deleteOutCart/{{$c->id}}" class="remove">×</a>
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
