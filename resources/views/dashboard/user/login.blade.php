@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-4">
                <h4>User Login</h4>
                <hr>
                <form method="POST" action="{{ route('user.login-user') }}">

                    @if (Session::get('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group mt-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"
                            name="email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"
                            name="password" >
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mt-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        Don't have an account ? <a href="{{ route('user.register') }}">Register</a>
                    </div>
            </div>
        </div>
    </div>

@endsection
