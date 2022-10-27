@extends('layouts.master')

@section('title', 'Cart')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
    <main class="main">
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>All Flash Deals</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <div class="page-content contact-us">
            <div class="container">
                <section class="category-section category-2cols-simple mb-10 pb-1">
                    <div class="col-md-10" style="margin: auto">
                        <div class="category-wrap mb-5">
                            <div class="category category-absolute category-default overlay-zoom">
                                <a href="#">
                                    <figure>
                                        <img src="{{asset($data->image)}}" alt="Category Banner"
                                             width="400" height="100" style="background-color: #423D39;" />
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>

                    <h2 class="title title-center mb-6">{{$data->title}}</h2>

                    <div class="product-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach($data->campaignProducts as $row)
                            @php
                                $row = \App\Product::find($row->product_id);
                            @endphp
                            @if ($row->is_enable != 0)
                                @include('products.single-product2',['row' => $row])
                            @endif
                        @endforeach
                    </div>

                </section>
            </div>
        </div>
    </main>
@stop

@section('script')
@stop

