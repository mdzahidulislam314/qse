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
                    <h2 class="title title-center mb-5">Campaigns</h2>
                    <div class="row">
                        @foreach($campaigns as $item)
                        <div class="col-md-4">
                            <div class="category-wrap">
                                <div class="category category-absolute category-default overlay-zoom">
                                    <a href="{{route('show.campaign', $item->slug)}}">
                                        <figure>
                                            <img src="{{asset($item->image)}}" alt="Category Banner"
                                                 width="400" height="200" style="background-color: #423D39;" />
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </main>
@stop

@section('script')
@stop

