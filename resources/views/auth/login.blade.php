@extends('layouts.master')

@section('title', 'Login')

@section('css')

@stop

@section('main')
    <main class="main">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Login or Register</h1>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="login-popup">
                    @if(Session::has('error'))
                        <p class="alert alert-danger text-center mt-3" style="width: 100%;color: red;">{{ Session::get('error') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sign-up" class="nav-link">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                <div class="form-group">
                                    <label>Email address *</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                </div>
                                <div class="form-checkbox d-flex align-items-center justify-content-between">
                                    <input type="checkbox" class="custom-checkbox" id="remember" value="{{ old('remember') ? 'checked' : '' }}">
                                    <label for="remember">Remember me</label>
                                    <a href="#">Last your password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign In</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="sign-up">
                                <form  method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Your Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Email *</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password" required>
                                        <label class="">Password have Min 6 character*</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </form>
                            </div>
                        </div>
                        <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="{{url('login/facebook')}}" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="{{url('login/google')}}" class="social-icon social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop

@section('js')

@stop
