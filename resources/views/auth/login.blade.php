@extends('layouts.master')

@section('title', 'Login')

@section('css')

@stop

@section('main')
    <main class="main">
        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-5 mx-auto">
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
                    <div class="login-form">
                        <div class="login-header">
                            <img src="assets/img/logo/logo.png" alt="" />
                            <p>Login Your account</p>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Your Email" name="email" value="{{ old('email') }}" required/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Your Password" name="password" value="{{ old('password') }}" required/>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember" />
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
{{--                                <a href="forgot-password.html" class="forgot-pass">Forgot Password?</a>--}}
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                            </div>
                        </form>
                        <div class="login-footer">
                            <p>Don't have an account? <a href="{{route('register')}}">Register.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('js')

@stop
