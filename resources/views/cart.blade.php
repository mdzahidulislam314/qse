@extends('layouts.master')
@section('shoppingCart') active @stop
@section('title', 'Cart')

@section('css')
    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
    <main class="main cart">
        @if (Cart::count() > 0)
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="javascript:void(0)">Shopping Cart</a></li>
                    <li><a href="{{route('checkout.index')}}">Checkout</a></li>
                    <li><a href="javascript:void(0)">Order Complete</a></li>
                </ul>
            </div>
        </nav>
        <div class="page-content">
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
                        <ul style="margin: 0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <th class="product-price"><span>Price</span></th>
                                <th class="product-quantity"><span>Quantity</span></th>
                                <th class="product-subtotal"><span>Subtotal</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <figure>
                                                <img src="{{ asset('uploads/products/'.$item->model->image) }}" alt="product" width="300" height="338">
                                            </figure>
                                        </a>
                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-close"><i class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="{{ route('shop.show', $item->model->slug) }} ">
                                        {{ Illuminate\Support\Str::limit($item->model->name, 20) }}
                                    </a>
                                    @if($item->options->has('size')) <p class="mb-0">Size: {{$item->options->size}}</p>@endif
                                    @if($item->options->has('color')) <p class="mb-0">Color: {{$item->options->color}}</p>@endif
                                </td>
                                <td class="product-price"><span class="amount">{{presentPrice($item->model->getPrice())}}</span></td>
                                <td class="product-quantity">
                                    <form action="{{route('cart.update', $item->rowId)}}" method="POST" id="updateQty">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->model->id}}">
                                        <div class="input-group">
                                            <input class="form-control" type="number" min="1"
                                                   max="10000000" value="{{$item->qty}}" name="quantity" id="qty">
                                            <button type="button" class="quantity-plus btn-plus w-icon-plus"></button>
                                            <button type="button" class="quantity-minus btn-minus w-icon-minus"></button>
                                        </div>
                                    </form>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">{{ presentPrice($item->subtotal) }}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="cart-action mb-6">
                            <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                            <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button>
                            <button type="button" class="btn btn-rounded btn-update" onclick="document.getElementById('updateQty').submit()">Update Cart</button>
                        </div>

                        @if (! session()->has('coupon'))
                            <form action="{{ route('coupon.store') }}" method="POST" class="coupon">
                                {{ csrf_field() }}
                                    <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                                    <input type="text" class="form-control mb-4" name="coupon_code" id="coupon_code" placeholder="Enter coupon code here..." required="">
                                    <button type="submit" class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                            </form>
                        @endif

                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="pin-wrapper" style="height: 791.4px;"><div class="sticky-sidebar" style="width: 393.317px;">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span>{{ presentPrice(Cart::subtotal()) }}</span>
                                    </div>

                                    @if (session()->has('coupon'))
                                    <hr class="divider">
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Discount:</label>
                                        <span>({{session()->get('coupon')['name']}}) </span>
                                        <form action="{{ route('coupon.destroy') }}" method="POST" class="d-inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" id="removeCoupon" class="text-danger">X</button>
                                        </form>
                                        <span style="color: red">- {{ presentPrice(session()->get('coupon')['discount']) }}</span>
                                    </div>
                                        <hr class="divider">
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">New Subtotal</label>
                                        <span>{{presentPrice($newSubtotal)}}</span>
                                    </div>
                                    @endif
                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50">{{ presentPrice($newTotal) }}</span>
                                    </div>
                                    <a href="{{ route('checkout.index') }}" class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout">
                                        Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="col-lg-12">
                <div class="text-center pb-70 pt-70">
                    <img src="/demo/box.png" width="60">
                    <div class="font-weight-bold mt-1">No Cart Item's Found!</div>
                </div>
            </div>
        @endif
    </main>
@stop

@section('js')

@stop

