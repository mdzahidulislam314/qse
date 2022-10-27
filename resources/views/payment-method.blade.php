@extends('layouts.master')
@section('payment') active @stop
@section('title', 'Payment')

@section('css')
    <style>
        button#removeCoupon {
            background: none;
            border: none;
        }
    </style>
@stop

@section('main')
    <main class="main">

        <div class="steps-wrap mt-5 mb-4">
            <div class="container">
                <ul class="list-inline step-tabs">
                    <li class="step-tab @yield('shoppingCart')">
                        <a href="{{ route('cart.index') }}" class="step-tab-link">
                            <span class="step-tab-text">
                                SHOPPING CART
                                <span class="bg-text">01</span>
                            </span>
                        <a>
                    </li>
                    <li class="step-tab @yield('shipping')">
                        <a href="{{route('checkout.index')}}" class="step-tab-link">
                            <span class="step-tab-text">
                                SHIPPING
                                <span class="bg-text">02</span>
                            </span>
                        </a>
                    </li>
                    <li class="step-tab @yield('payment')">
                        <a href="{{route('payment.method')}}" class="step-tab-link">
                            <span class="step-tab-text">
                                PAYMENT
                                <span class="bg-text">03</span>
                            </span>
                        </a>
                    </li>
                    <li class="step-tab @yield('orderComplete')">
                        <span class="step-tab-text">
                            ORDER COMPLETE
                            <span class="bg-text">04</span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>


        <div class="page-content">
            <div class="cart">
                <div class="container">
                    @if (session()->has('success_message'))
                        <div class="alert alert-success mb-2">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
                    @if (session()->has('error_message'))
                        <div class="alert alert-danger mb-2">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger mb-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="accordion-summary" id="accordion-payment">
                                <div class="card">
                                    <div class="card-header" id="heading-1">
                                        <h2 class="card-title">
                                            <a data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1" class="collapsed" role="">
                                                Cash On Delivery (COD)
                                            </a>
                                        </h2>
                                    </div>
                                    <!-- End .card-header -->
                                    <div id="collapse-1" class="collapse" aria-labelledby="heading-1" data-parent="#accordion-payment" style="">
                                        <div class="card-body">
                                            <p>
                                                ➜ ক্যাশ অন ডেলিভারির ক্ষেত্রে ডেলিভারি চার্জ ঢাকার মধ্যে ৫০ টাকা, ঢাকার বাইরে ১২০ টাকা।

                                                ➜ ঢাকার বাহিরে প্রোডাক্ট রেড-এক্স (RedEx) কুরিয়ারে হোম ডেলিভারি করা হবে এবং সেক্ষেত্রে ডেলিভারি চার্জ বাবদ ১২০ টাকা অগ্রিম বিকাশ করতে হবে ।

                                                ➜ আমাদের মার্চেন্ট বিকাশ নম্বরঃ 01707-077033

                                                ➜ ঢাকার মধ্যে ডেলিভারি সময় ১-২ কর্ম দিবস এবং ঢাকার বাইরে ৩-৪ কর্ম দিবস।
                                            </p>
                                        </div>
                                        <!-- End .card-body -->
                                    </div>
                                    <!-- End .collapse -->
                                </div>
                                <!-- End .card -->
                                <div class="card">
                                    <div class="card-header" id="heading-2">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                Bkash payments
                                            </a>
                                        </h2>
                                    </div>
                                    <!-- End .card-header -->
                                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment" style="">
                                        <div class="card-body">
                                            sdfsdfsdf
                                        </div>
                                    </div>
                                </div>
                                <!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-3">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                Nagot payments
                                            </a>
                                        </h2>
                                    </div>
                                    <!-- End .card-header -->
                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                        <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.</div>
                                        <!-- End .card-body -->
                                    </div>
                                    <!-- End .collapse -->
                                </div>
                                <!-- End .card -->
                            </div>

                        </div>
                        <aside class="col-lg-4">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3>
                                <table class="table table-summary">
                                    <tbody>

                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>{{ presentPrice(Cart::subtotal()) }}</td>
                                    </tr>

                                    {{--Coupon area Start--}}
                                    @if (session()->has('coupon'))
                                        <tr class="summary-subtotal" style="border-bottom: 2px dashed #39f">
                                            <td>Discount:({{session()->get('coupon')['name']}})
                                                <form action="{{ route('coupon.destroy') }}" method="POST" class="d-inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" id="removeCoupon" class="text-danger">X</button>
                                                </form>
                                            </td>
                                            <td class="text-danger">- {{ presentPrice(session()->get('coupon')['discount']) }}</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>New Subtotal:</td>
                                            <td>{{presentPrice($newSubtotal)}}</td>
                                        </tr>
                                    @endif
                                    {{--Coupon area End--}}

                                    <tr class="summary-subtotal">
                                        <td>Vat:</td>
                                        <td>{{ presentPrice($newTax) }}</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Grand Total:</td>
                                        <td>{{ presentPrice($newTotal) }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                                <a href="{{ route('checkout.index') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div>
                            <a href="{{ route('shop.index') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside>

                    </div>
                </div>
            </div>
        </div>

    </main>
@stop

@section('js')

@stop

