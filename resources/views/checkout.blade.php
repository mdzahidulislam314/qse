@extends('layouts.master')
@section('title', 'Checkout')
@section('shipping') active @stop

@section('css')
    <style>
        .form-check-input {
            position: relative;
            margin-top: .3rem;
            margin-left: -1.40rem;
        }
    </style>
    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')

    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{route('cart.index')}}">Shopping Cart</a></li>
                    <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                    <li><a href="javascript:void(0)">Order Complete</a></li>
                </ul>
            </div>
        </nav>

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                @if(count($errors) > 0)
                    <div class="alert alert-danger mb-2">
                        <ul style="margin-bottom: 0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form checkout-form" action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    @csrf
                    <div class="row mb-9">
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                Billing Details
                            </h3>
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Full Name *</label>
                                        @if (auth()->user())
                                            <input type="text" class="form-control form-control-md" name="name" value="{{ auth()->user()->name }}" required="">
                                        @else
                                            <input type="text" class="form-control form-control-md" id="name" name="name" value="{{ old('name') }}" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        @if (auth()->user())
                                            <input type="text" class="form-control" id="number" name="number" value="{{ auth()->user()->number }}" required>
                                        @else
                                            <input type="text" class="form-control form-control-md" name="number" value="{{ old('number') }}" required="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>Email address *</label>
                                @if (auth()->user())
                                    <input type="email" class="form-control form-control-md" id="email" name="email" value="{{ auth()->user()->email }}" required>
                                @else
                                    <input type="email" class="form-control form-control-md" id="email" name="email" value="{ old('email') }}" required>

                                @endif
                            </div>

                            <div class="form-group">
                                <label>Shipping address *</label>
                                <input type="text" class="form-control form-control-md mb-2" name="shipping_address" value="{{ old('shipping_address') }}" required>
                                <input type="text" class="form-control form-control-md" name="shipping_address_2" value="{{ old('shipping_address_2') }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea class="form-control mb-0" name="order_note" cols="30" rows="4" placeholder="Notes about your order">{{ old('order_note') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="pin-wrapper"><div class="order-summary-wrapper sticky-sidebar" >
                                    <h3 class="title text-uppercase ls-10">Your Order</h3>
                                    <div class="order-summary">
                                        <table class="order-table" id="cart-wrapper">

                                        </table>
                                        <div class="shipping-methods">
                                            <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping</h4>
                                            <ul id="shipping-method" class="mb-4">
{{--                                                <li>--}}
{{--                                                    <div class="custom-radio">--}}
{{--                                                        <input type="radio" id="free-shipping" class="custom-control-input" name="shipping" value="free">--}}
{{--                                                        <label for="free-shipping" class="custom-control-label color-dark">Free--}}
{{--                                                            Shipping</label>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="radio" id="local-pickup" class="custom-control-input" name="shipping" value="inside">
                                                        <label for="local-pickup" class="custom-control-label color-dark"> Inside Dhaka City</label>
                                                        <span class="text-warning ml-1">(Tk.{{$settingsArr['inside_ship_amount'] ?? ''}})</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="radio" id="flat-rate" class="custom-control-input" name="shipping" value="outside">
                                                        <label for="flat-rate" class="custom-control-label color-dark">Outsite  Dhaka City</label>
                                                        <span class="text-warning ml-1">(Tk.{{$settingsArr['outside_ship_amount'] ?? ''}})</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="payment-methods" id="payment_method">
                                            <h4 class="title font-weight-bold ls-25 pb-0 mb-2">Payment Methods</h4>
                                            @if (array_key_exists('cod_status', $settingsArr) && $settingsArr['cod_status'] == 1)
                                                <div class="custom-radio mb-3">
                                                    <input type="radio" id="cod" class="custom-control-input" name="payment_method" value="COD">
                                                    <label for="cod" class="custom-control-label color-dark">{{ get_setting('cod_title') }}</label>
                                                </div>
                                                <div class="pay-method-desc">
                                                    <div class="p-4">
                                                        {!! get_setting('cod_desc') !!}
                                                    </div>
                                                </div>
                                            @endif
                                            @if (array_key_exists('rocket_status', $settingsArr) && $settingsArr['rocket_status'] == 1)
                                                <div class="custom-radio mb-3">
                                                    <input type="radio" id="Rocket" class="custom-control-input" name="payment_method" value="Rocket">
                                                    <label for="Rocket" class="custom-control-label color-dark">{{ get_setting('rocket_title') }}</label>
                                                </div>
                                                <div class="pay-method-desc">
                                                    <div class="p-4">
                                                        {!! get_setting('rocket_desc') !!}
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <input type="text" class="form-control" name="rocket_trx_id" placeholder="Transaction ID">
                                                    </div>
                                                </div>
                                            @endif
                                            @if (array_key_exists('nagad_status', $settingsArr) && $settingsArr['nagad_status'] == 1)
                                                <div class="custom-radio mb-3">
                                                    <input type="radio" id="Nagad" class="custom-control-input" name="payment_method" value="Nagad">
                                                    <label for="Nagad" class="custom-control-label color-dark">{{ get_setting('nagad_title') }}</label>
                                                </div>
                                                <div class="pay-method-desc">
                                                    <div class="p-4">
                                                         {!! get_setting('nagad_desc') !!}
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <input type="text" class="form-control" name="nagad_trx_id" placeholder="Transaction ID">
                                                    </div>
                                                </div>
                                            @endif
                                            @if (array_key_exists('bkash_status', $settingsArr) && $settingsArr['bkash_status'] == 1)
                                                <div class="custom-radio mb-3">
                                                    <input type="radio" id="Bkash" class="custom-control-input" name="payment_method" value="Bkash">
                                                    <label for="Bkash" class="custom-control-label color-dark">{{ get_setting('bkash_title') }}</label>
                                                </div>
                                                <div class="pay-method-desc">
                                                    <div class="p-4">
                                                        {!! get_setting('bkash_desc') !!}
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <input type="text" class="form-control" name="bkash_trx_id" placeholder="Transaction ID">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group place-order pt-6">
                                            <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>

@stop

@section('script')
    <script>

        (function(){
            // payment select
            $(".payAttr").click(function() {
                $('input[name="trx_id"]').removeAttr("required", false);
                var data = $(this).closest('.card-header').next('.card-body').find('input[name="trx_id"]').attr("required", true);
            });
            // get cart html via ajax
            $.get("/cart/get-cart-partial", function(data, status){
                $('#cart-wrapper').html(data.html);
            });

            $('input:radio[name="shipping"]').change(
                function(){
                    /*$('#cart-wrapper').html("<img src='loading.gif' />");*/
                    if ($(this).is(':checked')) {
                        var val =  $(this).val();
                        $.get("/cart/set-shipping?shipping="+val, function(data, status){
                            console.log(data);
                            $('#cart-wrapper').html(data.html);
                        });
                    }
                }
            );

        })();

        $('input:radio[name="payment_method"]').change(function () {
            $('.pay-method-desc').slideUp();
            $('input[name="trx_id"]').removeAttr("required", false);
            $(this).closest('.custom-radio').next('.pay-method-desc').slideDown();
            $(this).closest('.custom-radio').next('.pay-method-desc').find('input[name="trx_id"]').attr("required", true);
        });

    </script>
@stop
