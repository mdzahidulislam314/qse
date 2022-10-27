@extends('layouts.master')

@section('title', 'Cart')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
    <main class="main">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">FAQs</h1>
            </div>
        </div>
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>FAQs</li>
                </ul>
            </div>
        </nav>

        <div class="container pt-40 pb-40">
            <div class="row">
                @foreach($faqs as $row)
                <div class="col-md-6 mb-8">
                    <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse1-2" class="expand">{{$row->order_by}}. {{$row->title}}</a>
                            </div>
                            <div id="collapse1-2" class="card-body collapsed">
                                <p class="mb-0">
                                    {!! $row->desc !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </main>
@stop

@section('script')
@stop

