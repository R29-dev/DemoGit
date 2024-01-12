@extends('Frontend.layouts.app')
@section('content')
    <form method="post" class="form-horizontal m-t-30">
        @csrf
        <div class="form-group">
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <label>Brand</label>
            <input type="text" placeholder="Brand" name="name" required class="form-control" value="{{ $data['name'] }}">
        </div>
        {{-- <button style="background-color: #FE980F;font-size: 20px; border: 0;"> <a class="text-white"style="color: white;""></a></button> --}}
        <input class="btn btn-success ml-2 text-white" fdprocessedid="83u3rf" value="Update Brand " type="submit">

    </form>
@endsection