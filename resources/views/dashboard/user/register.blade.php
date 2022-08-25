@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-4">
                <h4>User Register</h4>
                <hr>
                <form method="POST" action="{{ route('user.register-user') }}" autocomplete="off">

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @csrf

                    <div class="form-group mt-4">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Enter name"/>
                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mt-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Enter email">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"
                            name="password" placeholder="Enter password"/>
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group mt-4">
                        <label for="password_confirmation">Re-enter Password</label>
                        <input type="password" class="form-control"
                            id="password_confirmation" name="password_confirmation" placeholder="Re-enter password">
                        <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>

                    </div>
                    <div class="form-group mt-4">
                        Already have an account ? <a href="{{ route('user.login') }}">Login</a>
                    </div>
            </div>
        </div>
    </div>

@endsection
