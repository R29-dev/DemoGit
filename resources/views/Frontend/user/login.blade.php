@extends('Frontend.layouts.app')
@section('content')
    @if ($errors->has('loginError'))
        <div class="alert alert-danger">
            {{ $errors->first('loginError') }}
        </div>
    @endif
    <div class="login-form"><!--login form-->
        <h2>Login to your account</h2>

        <form action="" method="post">
            @csrf
            <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" />
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Password" name="password" />
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <span>
                <input type="checkbox" class="checkbox" name="remember_me">
                Keep me signed in
            </span>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div><!--/login form-->
@endsection
