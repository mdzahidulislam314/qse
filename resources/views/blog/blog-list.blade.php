@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Blogs</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-6">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li>List</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        @foreach($blogs as $row)
                            <article class="post post-list post-listing mb-md-10 mb-6 pb-2 overlay-zoom mb-4">
                            <figure class="post-media br-sm">
                                <a href="{{route('show.blogs', $row->slug)}}">
                                    <img src="{{asset(productImage($row->image))}}" width="930"
                                         height="500" alt="blog">
                                </a>
                            </figure>
                            <div class="post-details">
                                <div class="post-cats text-primary">
                                    <a href="#">{{$row->blogCategory->name}}</a>
                                </div>
                                <h4 class="post-title">
                                    <a href="{{route('show.blogs', $row->slug)}}">{{$row->title}}</a>
                                </h4>
                                <div class="post-content text-dot">
                                    <p class="mb-0">{!! $row->content !!}</p>
                                </div>
                                <a href="{{route('show.blogs', $row->slug)}}" class="btn btn-link btn-primary d-flex">(read more)</a>
                                <div class="post-meta">
                                    by <a href="#" class="post-author">Admin</a>
                                    - <a href="#" class="post-date">{{$row->created_at->diffForHumans()}}</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        {{ $blogs->appends(request()->input())->links('partials.custom-paginate') }}
                    </div>
                    <!-- End of Main Content -->
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
    </main>
@stop

@section('js')

@stop

