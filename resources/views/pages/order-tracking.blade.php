@extends('layouts.master')

@section('title', 'Cart')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="/site/assets/css/order-tracking.css">
@stop

@section('main')
    <main class="main">
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Track Your Order</li>
                </ul>
            </div>
        </nav>

            <div class="page-content contact-us pb-10">
                <div class="container">
                    <div class="row mb-10">
                        <div class="col-lg-6" style="margin: auto;">
                            <article class="card">
                                <header class="card-header"> Track Your Order </header>
                                <div class="card-body">
                                    <form class="form contact-us-form" action="{{route('check.order')}}" method="get">
                                        <div class="form-group">
                                            <label>Your Order Id</label>
                                            <input type="text" name="trackOrderId" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-rounded">Track Order</button>
                                    </form>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>

    </main>
@stop

@section('script')
@stop

