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
                <h1 class="page-title mb-0">All Brnads</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-6">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">Brands</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <section class="element-section text-center mt-10 mb-10 pt-5 pb-2" id="section-elements">
                    <div class="row elements cols-xl-5 cols-lg-4 cols-md-3 cols-xs-2 cols-1">
                        @foreach($brands as $item)
                        <div class="mb-4">
                            <a href="{{route('brand.show', $item->slug)}}" target="blank" class="element brands">
                                <img src="{{asset(productImage($item->image))}}" alt="img" width="80px" height="80px" class="mb-2">
                                <p>{{$item->name}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </main>
@stop

@section('js')

@stop

