@extends('Frontend.layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <a href="{{ url('Frontend/login') }}"> Login Now</a>
        </div>
    @endif
    <div class="signup-form"><!--sign up form-->
        <h2>New User</h2>
        <form action="" method="post">
            @csrf
            <input type="text" name="name" placeholder="Name"  value="{{ old('name') }}"  />
            @error('name')
                <p>{{ $message }}</p>
            @enderror
            <input type="email" name="email" placeholder="Email Address"  value="{{ old('email') }}"  />
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="Password" />
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-default">Signup</button>
        </form>
    </div><!--/sign up form-->
@endsection
