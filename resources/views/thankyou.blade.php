@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
    <main class="main order">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="javascript:void(0)">Shopping Cart</a></li>
                    <li class="passed"><a href="javascript:void(0)">Checkout</a></li>
                    <li class="active"><a href="javascript:void(0)">Order Complete</a></li>
                </ul>
            </div>
        </nav>

        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Thank you. Your order has been received.
                </div>
                <!-- End of Order Success -->
                @php
                    if (Session::get('order_id')){
                        $order = \App\Order::where('id', Session::get('order_id'))->first();
                    }
                @endphp
                <ul class="order-view list-style-none">
                    <li>
                        <label>Order number</label>
                        <strong>{{$order->order_id ?? ''}}</strong>
                    </li>
                    <li>
                        <label>Status</label>
                        <strong>{!! $order->statusHtml() ?? '' !!}</strong>
                    </li>
                    <li>
                        <label>Date</label>
                        <strong>{{ presentDate($order->created_at ?? '') }}</strong>
                    </li>
                    <li>
                        <label>Total</label>
                        <strong>{{ presentPrice($order->billing_total) ?? '' }}</strong>
                    </li>
                    <li>
                        <label>Payment method</label>
                        <strong>{{$order->payment_method ?? ''}}</strong>
                    </li>
                </ul>
                <!-- End of Order View -->
                @if ($order && $order->products)
                    <div class="order-details-wrapper mb-5">
                        <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                        <table class="order-table">
                            <thead>
                            <tr>
                                <th class="text-dark">Product</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($order->products as $row)
                                <tr>
                                <td>
                                    <a href="#">{{$row->name}}</a>&nbsp;<strong>x {{$row->pivot->quantity}}</strong><br>
                                </td>
                                <td>
                                    @if ($row->spacial_price == null)
                                        {{ presentPrice($row->pivot->quantity*$row->price) }}
                                    @elseif(isset($row->spacial_price))
                                        {{ presentPrice($row->pivot->quantity * $row->spacial_price) }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Subtotal:</th>
                                <td>{{presentPrice($order->billing_subtotal)}}</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>{{presentPrice($order->shipping_cost)}}</td>
                            </tr>
                            <tr class="total">
                                <th class="border-no">Total:</th>
                                <td class="border-no">{{presentPrice($order->billing_total)}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
                <a href="{{url('/')}}" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To Homapage</a>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@stop
