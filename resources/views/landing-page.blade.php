@extends('layouts.master')
@section('title', 'Homepage')
    @section('home') active @stop
@section('css')
@stop

@section('main')
    <main class="main">
        <div class="hero-section">
            <div class="hero-slider owl-carousel owl-theme">
                <div class="hero-single" style="background: url(https://cdn1.npcdn.net/userfiles/19726/service/1620211125_8fd3807c18cc9d6351abe5b4fff314b9.jpg?md5id=$md5id&new_width=750&new_height=1000&size=max);">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 col-lg-7">
                                <div class="hero-content">
                                    <h1 class="hero-title" data-animation="fadeInUp" data-delay=".50s"> <span>Air Conditioning And Heating Services</span> </h1>
                                    <p data-animation="fadeInUp" data-delay=".75s">
                                        There are many variations of passages orem psum available but the majority have suffered alteration in some form by injected humour or randomised.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="feature-area pt-120">
            <div class="container">
                <div class="feature-wrapper">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                                <div class="feature-icon">
                                    <i class="flaticon-satisfaction"></i>
                                </div>
                                <h4 class="feature-title">Satisfaction Guarantee</h4>
                                <p>It is a long established fact that a reader will be distracted</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                                <div class="feature-icon">
                                    <i class="flaticon-24-hours-support"></i>
                                </div>
                                <h4 class="feature-title">Emergency Service</h4>
                                <p>It is a long established fact that a reader will be distracted</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                                <div class="feature-icon">
                                    <i class="flaticon-engineer-1"></i>
                                </div>
                                <h4 class="feature-title">Fixed Right Promise</h4>
                                <p>It is a long established fact that a reader will be distracted</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="feature-icon">
                                    <i class="flaticon-money-bag"></i>
                                </div>
                                <h4 class="feature-title">No Upfront Payments</h4>
                                <p>It is a long established fact that a reader will be distracted</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-area py-120 mb-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="about-img">
                                <img src="/site/assets/img/about/01.jpg" alt="" />
                            </div>
                            <div class="about-experience">
                                <h1>25 <span>+</span></h1>
                                <span class="about-experience-text">Years Of Experience</span>
                            </div>
                            <div class="about-shape">
                                <img src="/site/assets/img/shape/01.svg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline">About Us</span>
                                <h2 class="site-title">We Provide Best <span>Pest Control</span> Services</h2>
                            </div>
                            <p class="about-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even.</p>
                            <div class="about-list-wrapper">
                                <ul class="about-list list-unstyled">
                                    <li>
                                        <div class="about-icon"><span class="fas fa-check-circle"></span></div>
                                        <div class="about-list-text">
                                            <p>Take a look at our round up of the best shows</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about-icon"><span class="fas fa-check-circle"></span></div>
                                        <div class="about-list-text">
                                            <p>It has survived not only five centuries</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="about-icon"><span class="fas fa-check-circle"></span></div>
                                        <div class="about-list-text">
                                            <p>Lorem Ipsum has been the ndustry standard dummy text</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-bottom">
                                <a href="about.html" class="theme-btn">Read More <i class="far fa-arrow-right"></i></a>
                                <div class="about-call">
                                    <div class="about-call-icon">
                                        <i class="fal fa-user-headset"></i>
                                    </div>
                                    <div class="about-call-content">
                                        <span>Call Us Anytime</span>
                                        <h5 class="about-call-number"><a href="tel:+2123654789">+2 123 654 789</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="service-area bg py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                        <div class="site-heading text-center mb-4">
                            <span class="site-title-tagline">Our Services</span>
                            <h2 class="site-title">Our Awesome <span>Services</span> For Lovely Clients</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="service-img">
                                <img src="site/assets/img/service/01.jpg" alt="" />
                            </div>
                            <div class="service-icon">
                                <i class="flaticon-heating"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="#">Heating Services</a>
                                </h3>
                                <p class="service-text">
                                    There are many variations of passages orem psum available but the majority have suffered alteration in some.
                                </p>
                                <div class="service-arrow">
                                    <a href="#"><i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                            <div class="service-img">
                                <img src="site/assets/img/service/02.jpg" alt="" />
                            </div>
                            <div class="service-icon">
                                <i class="flaticon-air-conditioner"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="#">AC Installation</a>
                                </h3>
                                <p class="service-text">
                                    There are many variations of passages orem psum available but the majority have suffered alteration in some.
                                </p>
                                <div class="service-arrow">
                                    <a href="#"><i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                            <div class="service-img">
                                <img src="site/assets/img/service/03.jpg" alt="" />
                            </div>
                            <div class="service-icon">
                                <i class="flaticon-engineer-1"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="#">Cooler Cleaning</a>
                                </h3>
                                <p class="service-text">
                                    There are many variations of passages orem psum available but the majority have suffered alteration in some.
                                </p>
                                <div class="service-arrow">
                                    <a href="#"><i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="service-img">
                                <img src="site/assets/img/service/04.jpg" alt="" />
                            </div>
                            <div class="service-icon">
                                <i class="flaticon-wrench"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="#">Maintenance And Repair</a>
                                </h3>
                                <p class="service-text">
                                    There are many variations of passages orem psum available but the majority have suffered alteration in some.
                                </p>
                                <div class="service-arrow">
                                    <a href="#"><i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                            <div class="service-img">
                                <img src="/site/assets/img/service/05.jpg" alt="" />
                            </div>
                            <div class="service-icon">
                                <i class="flaticon-vacuum-cleaner"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="#">AC Duct Cleaning</a>
                                </h3>
                                <p class="service-text">
                                    There are many variations of passages orem psum available but the majority have suffered alteration in some.
                                </p>
                                <div class="service-arrow">
                                    <a href="#"><i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                            <div class="service-img">
                                <img src="/site/assets/img/service/06.jpg" alt="" />
                            </div>
                            <div class="service-icon">
                                <i class="flaticon-technical-support"></i>
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="#">Quality Testing</a>
                                </h3>
                                <p class="service-text">
                                    There are many variations of passages orem psum available but the majority have suffered alteration in some.
                                </p>
                                <div class="service-arrow">
                                    <a href="#"><i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="choose-area py-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="choose-content wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline">Why Choose Us</span>
                                <h2 class="site-title">Trusted AC Service When <span>You Need</span> It Most</h2>
                            </div>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                            </p>
                            <div class="choose-wrapper mt-4">
                                <div class="choose-item">
                                    <div class="choose-icon">
                                        <i class="flaticon-technician"></i>
                                    </div>
                                    <div class="choose-item-content">
                                        <h4>Expert Technician</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available the majority have suffered alteration injected humour.</p>
                                    </div>
                                </div>
                                <div class="choose-item">
                                    <div class="choose-icon">
                                        <i class="flaticon-money-bag"></i>
                                    </div>
                                    <div class="choose-item-content">
                                        <h4>Affordable Pricing</h4>
                                        <p>There are many variations of passages of Lorem Ipsum available the majority have suffered alteration injected humour.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-img wow fadeInRight" data-wow-duration="1s" data-wow-delay=".25s">
                            <img src="/site/assets/img/choose/01.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="counter-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-wrench"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="1200" data-speed="3000">1200</span>
                                <h6 class="title">+ Projects Done</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-happy"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
                                <h6 class="title">+ Happy Clients</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-technician"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="1500" data-speed="3000">1500</span>
                                <h6 class="title">+ Experts Staffs</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <i class="flaticon-quality"></i>
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                <h6 class="title">+ Win Awards</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="portfolio-area bg py-120">
            <div class="container">
                <div class="row wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Portfolio</span>
                            <h2 class="site-title">Projects That <span>Completed In</span> Recent Times</h2>
                        </div>
                    </div>
                </div>
                <div class="portfolio-slider owl-carousel owl-theme popup-gallery wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="portfolio-item">
                        <div class="portfolio-img">
                            <img src="/site/assets/img/portfolio/01.jpg" alt="" />
                        </div>
                        <div class="portfolio-content">
                            <a class="popup-img portfolio-link" href="/site/assets/img/portfolio/01.jpg"><i class="far fa-plus"></i></a>
                            <div class="portfolio-info">
                                <h5 class="portfolio-subtitle"><span>//</span> Repair</h5>
                                <a href="#">
                                    <h4 class="portfolio-title">Air Condition Repair</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="portfolio-img">
                            <img src="/site/assets/img/portfolio/02.jpg" alt="" />
                        </div>
                        <div class="portfolio-content">
                            <a class="popup-img portfolio-link" href="/site/assets/img/portfolio/02.jpg"><i class="far fa-plus"></i></a>
                            <div class="portfolio-info">
                                <h5 class="portfolio-subtitle"><span>//</span> Repair</h5>
                                <a href="#">
                                    <h4 class="portfolio-title">Air Condition Repair</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="portfolio-img">
                            <img src="/site/assets/img/portfolio/03.jpg" alt="" />
                        </div>
                        <div class="portfolio-content">
                            <a class="popup-img portfolio-link" href="/site/assets/img/portfolio/03.jpg"><i class="far fa-plus"></i></a>
                            <div class="portfolio-info">
                                <h5 class="portfolio-subtitle"><span>//</span> Repair</h5>
                                <a href="#">
                                    <h4 class="portfolio-title">Air Condition Repair</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="portfolio-img">
                            <img src="/site/assets/img/portfolio/04.jpg" alt="" />
                        </div>
                        <div class="portfolio-content">
                            <a class="popup-img portfolio-link" href="/site/assets/img/portfolio/04.jpg"><i class="far fa-plus"></i></a>
                            <div class="portfolio-info">
                                <h5 class="portfolio-subtitle"><span>//</span> Repair</h5>
                                <a href="#">
                                    <h4 class="portfolio-title">Air Condition Repair</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="portfolio-img">
                            <img src="/site/assets/img/portfolio/05.jpg" alt="" />
                        </div>
                        <div class="portfolio-content">
                            <a class="popup-img portfolio-link" href="/site/assets/img/portfolio/05.jpg"><i class="far fa-plus"></i></a>
                            <div class="portfolio-info">
                                <h5 class="portfolio-subtitle"><span>//</span> Repair</h5>
                                <a href="#">
                                    <h4 class="portfolio-title">Air Condition Repair</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item">
                        <div class="portfolio-img">
                            <img src="/site/assets/img/portfolio/06.jpg" alt="" />
                        </div>
                        <div class="portfolio-content">
                            <a class="popup-img portfolio-link" href="/site/assets/img/portfolio/06.jpg"><i class="far fa-plus"></i></a>
                            <div class="portfolio-info">
                                <h5 class="portfolio-subtitle"><span>//</span> Repair</h5>
                                <a href="#">
                                    <h4 class="portfolio-title">Air Condition Repair</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-area pb-120">
            <div class="container-fluid px-0">
                <div class="video-content" style="background-image: url(/site/assets/img/video/01.jpg);">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="video-wrapper">
                                <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="team-area pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Team</span>
                            <h2 class="site-title">Meet With Our <span>Experts</span> Team Member</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="team-img">
                                <img src="/site/assets/img/team/01.jpg" alt="thumb" />
                            </div>
                            <div class="team-content">
                                <div class="team-bio">
                                    <h5><a href="#">Edna Craig</a></h5>
                                    <span>Manager</span>
                                </div>
                                <div class="team-social">
                                    <ul class="team-social-btn">
                                        <li>
                                            <span><i class="far fa-share-alt"></i></span>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                            <div class="team-img">
                                <img src="/site/assets/img/team/02.jpg" alt="thumb" />
                            </div>
                            <div class="team-content">
                                <div class="team-bio">
                                    <h5><a href="#">Jeffrey Cox</a></h5>
                                    <span>CEO & Founder</span>
                                </div>
                                <div class="team-social">
                                    <ul class="team-social-btn">
                                        <li>
                                            <span><i class="far fa-share-alt"></i></span>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                            <div class="team-img">
                                <img src="/site/assets/img/team/03.jpg" alt="thumb" />
                            </div>
                            <div class="team-content">
                                <div class="team-bio">
                                    <h5><a href="#">Audrey Gaddis</a></h5>
                                    <span>Technician</span>
                                </div>
                                <div class="team-social">
                                    <ul class="team-social-btn">
                                        <li>
                                            <span><i class="far fa-share-alt"></i></span>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                            <div class="team-img">
                                <img src="/site/assets/img/team/04.jpg" alt="thumb" />
                            </div>
                            <div class="team-content">
                                <div class="team-bio">
                                    <h5><a href="#">Rodger Garza</a></h5>
                                    <span>Technician</span>
                                </div>
                                <div class="team-social">
                                    <ul class="team-social-btn">
                                        <li>
                                            <span><i class="far fa-share-alt"></i></span>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cta-area pt-40 pb-40">
            <div class="cta-shape">
                <img class="cta-shape-1" src="/site/assets/img/shape/03.png" alt="" />
                <img class="cta-shape-2" src="/site/assets/img/shape/04.png" alt="" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto text-center">
                        <div class="cta-text">
                            <h1>We Provide <span>Quality</span> Services</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet leo tris commodo leo sed, scelerisque turpis. Ut in finibus tellus.</p>
                        </div>
                        <a href="#" class="theme-btn mt-30">Contact Now <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pricing-area bg py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Pricing Plan</span>
                            <h2 class="site-title">We Provide Global <span>Standard</span> Pricing Packages</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="pricing-header">
                                <div class="pricing-icon">
                                    <i class="flaticon-air-conditioner"></i>
                                </div>
                            </div>
                            <div class="pricing-feature">
                                <div class="pricing-content">
                                    <h4>Basic</h4>
                                    <h1 class="pricing-amount">$59.66</h1>
                                </div>
                                <ul>
                                    <li>Air Conditioner Installing</li>
                                    <li>Cooler Dust Cleaning</li>
                                    <li>Test Compressure Heat</li>
                                    <li>Air Filter Replacement</li>
                                    <li>24/7 Support Technician</li>
                                </ul>
                                <a href="#" class="theme-btn">Get Started <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                            <div class="pricing-header">
                                <div class="pricing-icon">
                                    <i class="flaticon-air-conditioner"></i>
                                </div>
                            </div>
                            <div class="pricing-feature">
                                <div class="pricing-content">
                                    <h4>Standard</h4>
                                    <h1 class="pricing-amount">$120.78</h1>
                                </div>
                                <ul>
                                    <li>Air Conditioner Installing</li>
                                    <li>Cooler Dust Cleaning</li>
                                    <li>Test Compressure Heat</li>
                                    <li>Air Filter Replacement</li>
                                    <li>24/7 Support Technician</li>
                                </ul>
                                <a href="#" class="theme-btn">Get Started <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                            <div class="pricing-header">
                                <div class="pricing-icon">
                                    <i class="flaticon-air-conditioner"></i>
                                </div>
                            </div>
                            <div class="pricing-feature">
                                <div class="pricing-content">
                                    <h4>Premium</h4>
                                    <h1 class="pricing-amount">$150.96</h1>
                                </div>
                                <ul>
                                    <li>Air Conditioner Installing</li>
                                    <li>Cooler Dust Cleaning</li>
                                    <li>Test Compressure Heat</li>
                                    <li>Air Filter Replacement</li>
                                    <li>24/7 Support Technician</li>
                                </ul>
                                <a href="#" class="theme-btn">Get Started <i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonial-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Testimonials</span>
                            <h2 class="site-title text-white">What Our Client <span>Say's</span> About Us</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="/site/assets/img/testimonial/01.jpg" alt="" />
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Sylvia H Green</h4>
                                <p>Clients</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of passages available but the majority have suffered alteration in some form by injected popularity belief believable.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="/site/assets/img/icon/quote.svg" alt="" />
                            </div>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="/site/assets/img/testimonial/02.jpg" alt="" />
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Gordo Novak</h4>
                                <p>Clients</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of passages available but the majority have suffered alteration in some form by injected popularity belief believable.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="/site/assets/img/icon/quote.svg" alt="" />
                            </div>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="/site/assets/img/testimonial/03.jpg" alt="" />
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Reid E Butt</h4>
                                <p>Clients</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of passages available but the majority have suffered alteration in some form by injected popularity belief believable.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="/site/assets/img/icon/quote.svg" alt="" />
                            </div>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="/site/assets/img/testimonial/04.jpg" alt="" />
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Parker Jimenez</h4>
                                <p>Clients</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of passages available but the majority have suffered alteration in some form by injected popularity belief believable.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="/site/assets/img/icon/quote.svg" alt="" />
                            </div>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="/site/assets/img/testimonial/05.jpg" alt="" />
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Heruli Nez</h4>
                                <p>Clients</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of passages available but the majority have suffered alteration in some form by injected popularity belief believable.
                            </p>
                            <div class="testimonial-quote-icon">
                                <img src="/site/assets/img/icon/quote.svg" alt="" />
                            </div>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="partner-area bg pt-50 pb-50">
            <div class="container">
                <div class="partner-wrapper partner-slider owl-carousel owl-theme">
                    <img src="/site/assets/img/partner/01.png" alt="thumb" />
                    <img src="/site/assets/img/partner/02.png" alt="thumb" />
                    <img src="/site/assets/img/partner/03.png" alt="thumb" />
                    <img src="/site/assets/img/partner/04.png" alt="thumb" />
                    <img src="/site/assets/img/partner/05.png" alt="thumb" />
                    <img src="/site/assets/img/partner/06.png" alt="thumb" />
                    <img src="/site/assets/img/partner/03.png" alt="thumb" />
                </div>
            </div>
        </div>

        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-duration="1s" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Blog</span>
                            <h2 class="site-title">Get Our Every <span>Single Latest</span> Update News & Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="/site/assets/img/blog/01.jpg" alt="Thumb" />
                            </div>
                            <div class="blog-item-info">
                                <h4 class="blog-title">
                                    <a href="#">There are many variations of the passages available suffered</a>
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
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                                </p>
                                <a class="theme-btn" href="#">Read More<i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                            <div class="blog-item-img">
                                <img src="/site/assets/img/blog/02.jpg" alt="Thumb" />
                            </div>
                            <div class="blog-item-info">
                                <h4 class="blog-title">
                                    <a href="#">There are many variations of the passages available suffered</a>
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
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                                </p>
                                <a class="theme-btn" href="#">Read More<i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                            <div class="blog-item-img">
                                <img src="/site/assets/img/blog/03.jpg" alt="Thumb" />
                            </div>
                            <div class="blog-item-info">
                                <h4 class="blog-title">
                                    <a href="#">There are many variations of the passages available suffered</a>
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
                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                                </p>
                                <a class="theme-btn" href="#">Read More<i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('script')

@stop
