
@extends('Frontend.layouts.app')
@section('content')
<div class="row">
@include('Frontend.layouts.slide')

<div class="col-sm-9">
    <div class="blog-post-area">
        <h2 class="title text-center">Update user</h2>
        <div class="signup-form"><!--sign up form-->
            <h2>Update User</h2>
            <form action="#">
                <input type="text" placeholder="Name" name="name" value="{{ $data['name'] }}"/>
                <input type="email" placeholder="Email Address" name="email" value="{{ $data['email'] }}"/>
                <input type="password" placeholder="Password" name="password" value="{{ $data['password'] }}"/>
                <input type="number" placeholder="phone" name="phone" value="{{ $data['phone'] }}"/>
                <input type="text" placeholder="address" name="address" value="{{ $data['address'] }}"/>
                {{-- <input type="file" placeholder="" name="avatar" value="{{ $data['address'] }}"/> --}}
                <input type="file" name="avatar" value="{{ $data['avatar'] }}">

                <img src="{{ asset('/upload/blog/image/' . $data['avatar']) }}" alt="Current Image"
                    width="100">
                    <br><br>
                <button type="submit" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
