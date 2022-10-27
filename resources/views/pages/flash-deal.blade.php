@extends('layouts.master')

@section('title', 'Cart')

@section('css')
    <link rel="stylesheet" type="text/css" href="/site/assets/css/style.min.css">
@stop

@section('main')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Contact Us</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content contact-us">
            <div class="container">
                <section class="content-title-section mb-10">
                    <h3 class="title title-center mb-3">Contact
                        With Chunaputi
                    </h3>
                    <p class="text-center">Lorem ipsum dolor sit amet,
                        consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                </section>
                <!-- End of Contact Title Section -->

                <section class="contact-information-section mb-10">
                    <div class="row owl-carousel owl-theme cols-xl-4 cols-md-3 cols-sm-2 cols-1" data-owl-options="{
                        'items': 4,
                        'nav': false,
                        'dots': false,
                        'loop': false,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '480': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4
                            }
                        }
                    }">
                        <div class="icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-email">
                                    <i class="w-icon-envelop-closed"></i>
                                </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">E-mail Address</h4>
                                <p> {{ $settingsArr['email'] ?? '' }} </p>
                            </div>
                        </div>
                        <div class="icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-headphone">
                                    <i class="w-icon-headphone"></i>
                                </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Phone Number</h4>
                                <p>{{ $settingsArr['phone'] ?? '' }}</p>
                            </div>
                        </div>
                        <div class="icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-map-marker">
                                    <i class="w-icon-map-marker"></i>
                                </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Address</h4>
                                <p>{{ $settingsArr['address'] ?? '' }}</p>
                            </div>
                        </div>
                        <div class="icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-fax">
                                    <i class="w-icon-fax"></i>
                                </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">IMO/Whats'up</h4>
                                <p>1-800-570-7777</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Information section -->

                <hr class="divider mb-10 pb-1">

                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Location Map</h4>
                            <div>
                                {!! $settingsArr['map_code'] ?? '' !!}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Send Us a Message</h4>
                            <form class="form contact-us-form" action="#" method="post">
                                <div class="form-group">
                                    <label for="username">Your Name</label>
                                    <input type="text" id="username" name="username"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email_1">Your Email</label>
                                    <input type="email" id="email_1" name="email_1"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea id="message" name="message" cols="30" rows="5"
                                              class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Section -->
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@stop

@section('script')
@stop

