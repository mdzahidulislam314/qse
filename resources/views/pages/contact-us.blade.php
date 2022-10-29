@extends('layouts.master')

@section('title', 'Cart')

@section('css')

@stop

@section('main')
    <main class="main">
        <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg);">
            <div class="container">
                <h2 class="breadcrumb-title">Contact Us</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>

        <div class="contact-area py-120">
            <div class="container">
                <div class="contact-wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact-content">
                                <div class="contact-info">
                                    <div class="contact-info-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h5>Office Address</h5>
                                        <p>{{ get_setting('address') }}</p>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <div class="contact-info-icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h5>Call Us</h5>
                                        <p>{{ get_setting('phone') }}</p>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <div class="contact-info-icon">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h5>Email Us</h5>
                                        <p><a href="" class="__cf_email__">{{ get_setting('email') }}</a></p>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <div class="contact-info-icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h5>Open Time</h5>
                                        <p>{{ get_setting('office_time') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 align-self-center">
                            <div class="contact-form">
                                <div class="contact-form-header">
                                    <h2>HAVE ANY QUESTIONS?</h2>
                                </div>
                                <form method="post" action="{{route('contact.store')}}" id="contact-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Your Name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Your Email" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Your Subject" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="comments" cols="30" rows="5" class="form-control" placeholder="Write Your Message"></textarea>
                                    </div>
                                    <button type="submit" class="theme-btn">Send Message <i class="far fa-paper-plane"></i></button>
                                    <div class="col-md-12 mt-3">
                                        <div class="form-messege text-success"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-map">
            {!! $settingsArr['map_code'] ?? '' !!}
        </div>
    </main>
@stop

@section('script')
@stop

