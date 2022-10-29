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
                            <img src="{{get_setting('header_logo')}}" alt="" />
                            <p>Create your account</p>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required/>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" required/>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Register</button>
                            </div>
                        </form>
                        <div class="login-footer">
                            <p>Already have an account? <a href="{{route('login')}}">Login.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('js')

@stop
