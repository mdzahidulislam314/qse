@extends('layouts.master')

@section('css') <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css"> @stop

@section('meta_title'){{ $page->meta_title }}@stop

@section('meta_description'){{ $page->meta_description }}@stop

@section('meta_keywords'){{ $page->meta_keywords }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $page->meta_title }}">
    <meta itemprop="description" content="{{ $page->meta_description }}">
    <meta itemprop="image" content="{{ asset(productImage($page->meta_img)) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $page->meta_title }}">
    <meta name="twitter:description" content="{{ $page->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset(productImage($page->meta_img)) }}">
{{--    <meta name="twitter:data1" content="{{ single_price($page->unit_price) }}">--}}
{{--    <meta name="twitter:label1" content="Price">--}}

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $page->meta_title }}" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="{{route('all.pages', $page->slug)}}" />
    <meta property="og:image" content="{{ asset(productImage($page->meta_img)) }}" />
    <meta property="og:description" content="{{ $page->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
{{--    <meta property="og:price:amount" content="{{ single_price($page->unit_price) }}" />--}}
@endsection

@section('main')
    <main class="main">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">{{$page->title}}</h1>
            </div>
        </div>
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>{{$page->title}}</li>
                </ul>
            </div>
        </nav>

        <div class="container pt-40 pb-40">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        {!! $page->desc !!}
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop

@section('script')
@stop

