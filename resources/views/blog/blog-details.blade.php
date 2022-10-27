@extends('layouts.master')

@section('css') <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css"> @stop

@section('meta_title'){{ $blog->meta_title }}@stop

@section('meta_description'){{ $blog->meta_description }}@stop

@section('meta_keywords'){{ $blog->meta_keywords }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $blog->meta_title }}">
    <meta itemprop="description" content="{{ $blog->meta_description }}">
    <meta itemprop="image" content="{{ asset(productImage($blog->meta_img)) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $blog->meta_title }}">
    <meta name="twitter:description" content="{{ $blog->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ asset(productImage($blog->meta_img)) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $blog->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{route('show.blogs', $blog->slug)}}" />
    <meta property="og:image" content="{{ asset(productImage($blog->meta_img)) }}" />
    <meta property="og:description" content="{{ $blog->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('main')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Blog Single</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="demo1.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li>{{$blog->title}}</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-8">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content post-single-content">
                        <div class="post post-grid post-single">
                            <figure class="post-media br-sm">
                                <img src="{{asset(productImage($blog->image))}}" alt="Blog" style="width:930px;height: 500px ">
                            </figure>
                            <div class="post-details">
                                <div class="post-meta">
                                    by <a href="#" class="post-author">Admin</a>
                                    - <a href="#" class="post-date">{{$blog->created_at->diffForHumans()}}</a>
                                    <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>0</span>Comments</a>
                                </div>
                                <h2 class="post-title"><a href="#">{{$blog->title}}</a></h2>
                                <div class="post-content">
                                    <p>
                                        {!! $blog->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End Post -->
                        <div class="social-links mb-10">
                            <div id="share"></div>
                        </div>
                        <!-- End Social Links -->

                        @if (count($relatedBlog))
                            <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">Related Posts</h4>
                            <div class="post-slider owl-carousel owl-theme owl-nav-top row cols-lg-3 cols-md-4 cols-sm-3 cols-xs-2 cols-1 pb-2" data-owl-options="{
                                'nav': true,
                                'dots': false,
                                'margin': 20,
                                'responsive': {
                                    '0': {
                                        'items': 1
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 2
                                    },
                                    '1200': {
                                        'items': 3
                                    }
                                }
                            }">
                                @foreach($relatedBlog as $row)
                                    <div class="post post-grid">
                                    <figure class="post-media br-sm">
                                        <a href="{{route('show.blogs', $row->slug)}}">
                                            <img src="{{asset(productImage($row->image))}}" alt="Post" width="296"
                                                 height="190" style="background-color: #bcbcb4;" />
                                        </a>
                                    </figure>
                                    <div class="post-details text-center">
                                        <div class="post-meta">
                                            by <a href="#" class="post-author">Admin</a>
                                            - <a href="#" class="post-date">{{$row->created_at->diffForHumans()}}</a>
                                        </div>
                                        <h4 class="post-title mb-3"><a href="{{route('show.blogs', $row->slug)}}">{{$row->title}}</a></h4>
                                        <a href="{{route('show.blogs', $row->slug)}}" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                        <div class="sidebar-overlay">
                            <a href="#" class="sidebar-close">
                                <i class="close-icon"></i>
                            </a>
                        </div>
                        <a href="#" class="sidebar-toggle">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <!-- End of Widget search form -->
                                <div class="widget widget-categories">
                                    <h3 class="widget-title bb-no mb-0">Categories</h3>
                                    <ul class="widget-body filter-items search-ul">
                                        @foreach($catgories as $row)
                                        <li><a href="blog.html">{{$row->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </aside>

                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@stop

@section('script')
    <script src="/site/assets/vendor/photoswipe/photoswipe.min.js"></script>
    <script src="/site/assets/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["twitter", "facebook", "linkedin", "pinterest","whatsapp"]
        });
    </script>
@stop

