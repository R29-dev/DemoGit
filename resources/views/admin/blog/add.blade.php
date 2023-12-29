@extends('admin.dashboard')
@section('content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Blog</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title">Add blog</h4>
                <h5 class="card-subtitle"> All bootstrap element classies </h5>
                <form method="post" class="form-horizontal m-t-30" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label >
                        <input type="text" placeholder="Title" name="Title"  class="form-control" value="">
                        @error('Title')
                            <p>{{ $message }}</p>
                        @enderror
                        <br>
                        <label>Image</label >
                            <input type="file"  name="Image"  class="form-control" value="" >
                            @error('Image')
                            <p>{{ $message }}</p>
                        @enderror
                            <br>
                            <label>Description</label >
                               <textarea type="text"  name="Description" placeholder="Description"  class="form-control" value="" ></textarea> 
                                @error('Description')
                                <p>{{ $message }}</p>
                            @enderror
                                <br>
                            <label>Content</label>
                            <Textarea class="form-control" name="Content" id="Content" value=""></Textarea>
                                   
                    </div>
                    <input class="btn btn-success ml-2 text-white" fdprocessedid="83u3rf" value="Add Blog" type="submit" >
                 </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>


@endsection