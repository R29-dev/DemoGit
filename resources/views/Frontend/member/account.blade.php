@extends('Frontend.layouts.app')
@section('content')
    <div class="blog-post-area">
        <h2 class="title text-center">Update user</h2>
        <div class="signup-form"><!--sign up form-->
            <h2>Update User</h2>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="Name" name="name" value="{{ $data['name'] }}" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                
                <input type="email" disabled placeholder="Email Address" name="email" value="{{ $data['email'] }}" />
                <input type="password" placeholder="Password" name="password" value="{{ $data['password'] }}" />
                <input type="number" placeholder="phone" name="phone" value="{{ $data['phone'] }}" />
                <input type="text" placeholder="address" name="address" value="{{ $data['address'] }}" />
                {{-- <input type="file" placeholder="" name="avatar" value="{{ $data['address'] }}"/> --}}
                <input type="file" name="avatar" value="{{ $data['avatar'] }}">
                @error('avatar')
                    <p>{{ $message }}</p>
                @enderror
                <br>

                <img src="{{ asset('/upload/user/avatar/' . $data['avatar']) }}" alt="Current Image" width="100">
                <br><br>
                <button type="submit" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>
@endsection
