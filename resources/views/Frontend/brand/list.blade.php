@extends('Frontend.layouts.app')
@section('content')
<div class="table-responsive m-t-20">
    <table class="table table-bordered table-responsive-lg">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 90%;">Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($data as $item )
          <tr>
            <th scope="row">{{ $item["id"] }}</th>
            <td>{{ $item["name"] }}</td>
            <td><a href="{{ url('/Frontend/account/brand/edit/'.$item['id']) }}"><i class="m-r-10 mdi mdi-grease-pencil"></i>Edit</a></td>
            <td><a href="{{ url('/Frontend/account/brand/delete/'.$item['id']) }}"><i class="m-r-10 mdi mdi-delete"></i>Delete</a></td>
          
        </tr>
          @empty
              "Không có dữ liệu"; 
          @endforelse
            
        </tbody>
    </table>

    <button class="btn btn-success ml-2" fdprocessedid="83u3rf"><a class="text-white" style="color: white" href="{{ url('/Frontend/account/brand/add') }}">Add Brand</a></button>
    {{-- <button style="background-color: #FE980F;font-size: 18px; border: 0;" > <a class="text-white"style="color: white;" href="{{ url('/Frontend/account/category/add') }}">Add Category </a></button> --}}
    


</div>
@endsection