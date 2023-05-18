@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@if (isset($cat))
    @php
        $meta_title = App\Category::find($cat->id)->meta_title;
        $meta_description = App\Category::find($cat->id)->meta_description;
    @endphp
@elseif (isset($brand))
    @php
        $meta_title = \App\Brand::find($brand->id)->meta_title;
        $meta_description = \App\Brand::find($brand->id)->meta_description;
    @endphp
@else
    @php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('main')
    <main class="main">
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg);">
            <div class="container">
                <h2 class="breadcrumb-title">Our Blog</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Our Blog</li>
                </ul>
            </div>
        </div>

        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    @foreach($products as $row)
                        <div class="col-md-4 col-lg-3">
                        <div class="product_wrap">
                            <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                                <div class="blog-item-img">
                                    <img src="/site/assets/img/blog/01.jpg" alt="Thumb" />
                                </div>
                                <div class="blog-item-info">
                                    <h4 class="blog-title">
                                        <a href="{{ route('shop.show', $row->slug) }}">There are many variations of the passages available suffered</a>
                                    </h4>
                                    <div class="blog-item-meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="far fa-calendar-alt"></i> August 30, 2022</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="theme-btn" href="#">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="pagination-area">
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop

@section('script')
    <script>
        $(".count").change(function(){
            var selValue = $(this).val();

            window.location = route('shop.index', {count: selValue});
        });
    </script>
@stop
