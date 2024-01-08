@extends('ekka.shop')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@section('content')
<form action="{{route('handleCart')}}" method="post" id="myForm">
    @csrf
    <div style="width: 100%;">
        @if ($count > 1)
          <div class="alert bg-danger alert-danger text-white text-center" role="alert">
            {{$message}}
            {{-- {{ Session::get('message') }} --}}
          </div>
        @endif
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                <!-- cart content Start -->
                <div class="ec-cart-content">
                    <div class="ec-cart-inner">
                        <div class="row">
                            {{-- <form action="#"> --}}
                                {{-- @foreach ($listCart as $c) --}}
                                @if ($sidoarjo > 0)
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Depo Sidoarjo</th>
                                                <th>Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listCart as $c)
                                            @if ($c->idstore == 1)
                                            <tr>
                                                <td><input type="checkbox" name="produk[]" onchange="this.form.submit()" @if(in_array($c->id, $choosen)) checked @endif value={{$c->id}}></td>
                                                {{-- <td><input type="checkbox" name="produk[]" value="{{$c->id}}"></td> --}}
                                                <td data-label="Product" class="ec-cart-pro-name"><a
                                                        href="product-left-sidebar.html"><img class="ec-cart-pro-img mr-4"
                                                            src={{ asset('uploads/'
                                                                    . $c->foto_produk) }}
                                                            alt="" />{{$c->nama}}</a></td>
                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                        class="amount">{{number_format(($c->harga) / 1, 2, '.', ',')}}</span></td>
                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                    style="text-align: center;">
                                                    <div class="">
                                                        <input class="" id="plusButton{{$c->produk_id}}" type="number"
                                                            name="cartqtybutton"  value={{$c->kuantitas}} data-product-id="{{ $c->produk_id }}" onchange="checkValue({{$c->produk_id}})" />
                                                    </div>
                                                    {{-- <div>
                                                        <input type="number" name="quantity" value="{{$c->kuantitas}}" min="1">

                                                        <!-- Plus and minus buttons -->
                                                        <button type="button" class="quantity-control" data-action="minus" data-id="{{ $c->id }}">-</button>
                                                        <button type="button" class="quantity-control" data-action="plus" data-id="{{ $c->id }}">+</button>
                                                    </div> --}}
                                                </td>
                                                <td data-label="Total" class="ec-cart-pro-subtotal">{{number_format(($c->harga*$c->kuantitas) / 1, 2, '.', ',')}}</td>
                                                 
                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                    {{-- <form action="{{route('deleteCart', $c->id)}}" method="post">
                                                        @csrf --}}
                                                        @method('DELETE') 
                                                        <input type="hidden" name="id" value={{$c->id}}>
                                                    <button class="ecicon eci-trash-o" name="button" value="delete"></button>
                                                {{-- </form> --}}
                                                </td>
                                                
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                                @if ($malang > 0)
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Depo Malang</th>
                                                <th>Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listCart as $c)
                                            @if ($c->idstore == 2)
                                            <tr>
                                                <td><input type="checkbox" id="produk" name="produk[]" onchange="this.form.submit()" @if(in_array($c->id, $choosen)) checked @endif value={{$c->id}}></td>
                                                {{-- <td><input type="checkbox" name="produk[]" value="{{$c->id}}"></td> --}}
                                                <td data-label="Product" class="ec-cart-pro-name"><a
                                                        href=""><img class="ec-cart-pro-img mr-4"
                                                            src={{ asset('uploads/'
                                                                    . $c->foto_produk) }}
                                                            alt="" />{{$c->nama}}</a></td>
                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                        class="amount">{{number_format(($c->harga) / 1, 2, '.', ',')}}</span></td>
                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                    style="text-align: center;">
                                                    <div class="">
                                                        <input class="" id="plusButton{{$c->produk_id}}" type="number"
                                                            name="cartqtybutton"  value={{$c->kuantitas}} data-product-id="{{ $c->produk_id }}" onchange="checkValue({{$c->produk_id}})" />
                                                    </div>
                                                </td>
                                                <td data-label="Total" class="ec-cart-pro-subtotal">{{number_format(($c->harga*$c->kuantitas) / 1, 2, '.', ',')}}</td>
                                                 
                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                    {{-- <form action="{{route('deleteCart', $c->id)}}" method="post">
                                                        @csrf --}}
                                                        @method('DELETE') 
                                                        <input type="hidden" name="id" value={{$c->id}}>
                                                    <button class="ecicon eci-trash-o" name="button" value="delete"></button>
                                                {{-- </form> --}}
                                                </td>
                                                
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                                @if ($surabaya > 0)
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Depo Surabaya</th>
                                                <th>Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listCart as $c)
                                            @if ($c->idstore == 3)
                                            <tr>
                                                <td><input type="checkbox" name="produk[]" id="produk" onchange="this.form.submit()" @if(in_array($c->id, $choosen)) checked @endif value={{$c->id}}></td>
                                                {{-- <td><input type="checkbox" name="produk[]" value="{{$c->id}}"></td> --}}
                                                <td data-label="Product" class="ec-cart-pro-name"><a
                                                        href="product-left-sidebar.html"><img class="ec-cart-pro-img mr-4"
                                                            src={{ asset('uploads/'
                                                                    . $c->foto_produk) }}
                                                            alt="" />{{$c->nama}}</a></td>
                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                        class="amount">{{number_format(($c->harga) / 1, 2, '.', ',')}}</span></td>
                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                    style="text-align: center;">
                                                    <div class="">
                                                        <input class="" id="plusButton{{$c->produk_id}}" type="number"
                                                            name="cartqtybutton"  value={{$c->kuantitas}} data-product-id="{{ $c->produk_id }}" onchange="checkValue({{$c->produk_id}})" />
                                                    </div>
                                                </td>
                                                <td data-label="Total" class="ec-cart-pro-subtotal">{{number_format(($c->harga*$c->kuantitas) / 1, 2, '.', ',')}}</td>
                                                 
                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                    {{-- <form action="{{route('deleteCart', $c->id)}}" method="post">
                                                        @csrf --}}
                                                        @method('DELETE') 
                                                        <input type="hidden" name="id" value={{$c->id}}>
                                                    <button class="ecicon eci-trash-o" name="button" value="delete"></button>
                                                {{-- </form> --}}
                                                </td>
                                                
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                                
                                {{-- @endforeach --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ec-cart-update-bottom">
                                            <a href="#">Continue Shopping</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <!--cart content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Summary</h3>
                        </div>
                        {{-- <div class="ec-sb-block-content">
                            <h4 class="ec-ship-title">Estimate Shipping</h4>
                            <div class="ec-cart-form">
                                <p>Enter your destination to get a shipping estimate</p>
                                <form action="#" method="post">
                                    <span class="ec-cart-wrap">
                                        <label>Country *</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_country" id="ec-cart-select-country"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">United States</option>
                                                <option value="1">Country 1</option>
                                                <option value="2">Country 2</option>
                                                <option value="3">Country 3</option>
                                                <option value="4">Country 4</option>
                                                <option value="5">Country 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>State/Province</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_state" id="ec-cart-select-state"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">Please Select a region, state
                                                </option>
                                                <option value="1">Region/State 1</option>
                                                <option value="2">Region/State 2</option>
                                                <option value="3">Region/State 3</option>
                                                <option value="4">Region/State 4</option>
                                                <option value="5">Region/State 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" name="postalcode" placeholder="Zip/Postal Code">
                                    </span>
                                </form>
                            </div>
                        </div> --}}
            
                        <div class="ec-sb-block-content">
                            <div class="ec-cart-summary-bottom">
                                <div class="ec-cart-summary">
                                    <div>
                                        <span class="text-left">Sub-Total</span>
                                        <span class="text-right" id="subtotal">Rp {{number_format($subTotal / 1, 2, '.', ',')}}</span>
                                    </div>
                                    <div>
                                        <span class="text-left">PPN (11%)</span>
                                        <span class="text-right">Rp {{number_format(($vat) / 1, 2, '.', ',')}}</span>
                                    </div>
                                    <div class="ec-cart-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right">Rp {{number_format(($total) / 1, 2, '.', ',')}}</span></span>
                                    </div>
                                </div>
            
                            </div>
                        </div>
                        <form action="{{route('masuk.order')}}" method="post">
                            @csrf
                            <input type="hidden" name="produk_array" id="produk_array" value="">
                            <button class="btn btn-primary" name="button" value="checkout" onclick="updateHiddenField()" >Check Out</button>
                        </form>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div>
            </div>
        </div>
    </div>
</section>
</form>
{{-- @push('scripts') --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Attach a change event handler to the input field
            $('#quantityInput').change(function() {
                // Trigger the form submission when the input value changes
                $('#myForm').submit();
            });
        });
        function checkValue(id){
            
            var value = $('#plusButton'+id).val();
            console.log(value);
            window.location.href = "cart/checkValue/"+ id + "/" + value;
        }
    </script>
{{-- @endpush --}}
{{-- @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Attach a click event handler to the plus button
                $('#plusButton').click(function() {
                    // Get the product ID from your view
                    var productId = $(this).data('product-id');

                    // Make an AJAX request to increase the count
                    $.ajax({
                        url: '/products/increase-count/' + productId,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            // Update the count in the view
                            // $('#count').text(parseInt($('#count').text()) + 1);
                            alert(response.message); // Optional: Show a success message
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Attach a change event handler to the checkbox
        $('#produk').change(function() {
            // Get the value of the checked checkbox
            var checkboxValue = $(this).is(':checked') ? $(this).val() : '';

            // Change the text dynamically based on the checkbox value
            $('#subtotal').text(checkboxValue);
        });
    });
</script> --}}
    {{-- @endpush --}}

<script>
    function updateHiddenField() {
        var checkboxes = document.getElementsByName('produk[]');
        var selectedItems = [];

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedItems.push(checkbox.value);
            }
        });

        // Update nilai pada elemen hidden
        document.getElementById('produk_array').value = JSON.stringify(selectedItems);
    }
</script>
@endsection


