@extends('Frontend.layouts.app')
@section('content')
    <div class="blog-post-area">
        <h2 class="title text-center">Product</h2>
        <div class="signup-form"><!--sign up form-->
            <h2>Product</h2>
            <form action="{{ url('/Frontend/account/add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <input type="number" placeholder="Price" name="price" value="{{ old('price') }}" />
                @error('price')
                <p>{{ $message }}</p>
            @enderror
                <br>
                <select class="form-select" name="id_category" aria-label="Default select example">

                    <option selected>Please choose category</option>
                    @foreach ($data as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                <select class="form-select" name="id_brand" aria-label="Default select example">
                    <option selected>Please choose brand</option>
                    @foreach ($datas as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
                <select class="form-select" name="sale" id="saleSelect" aria-label="Default select example">
                    <option selected>Sale</option>
                    <option value="0">New</option>
                    <option value="1">Sale</option>
                </select>
                <div class="row" id="saleInputDiv" style="display: none;">
                    <div class="col-sm-3">
                        <input type="number" placeholder="0" name="sale_input" value="{{ old('sale_input') }}" id="saleInput" />
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" style="font-size: 20px" class="form-text">% </span>
                    </div>
                </div>
                <input type="text" placeholder="Company profile" name="company" value="{{ old('company') }}" />
                @error('company')
                <p>{{ $message }}</p>
            @enderror
                <br>

                <input type="file" name="hinhanh[]" value="{{ old('hinhanh[]') }}" multiple>
                @error('hinhanh')
                                <p>{{ $message }}</p>
                            @enderror
                                <br>
                {{-- <input type="number" name="" id=""> --}}

                {{-- <img src="{{ $item['hinhanh'] }}" alt="Current Image" width="100"> --}}
                {{-- <br><br> --}}

                <textarea id="" cols="30" rows="10" name="detail" placeholder="Detail" >{{ old('detail') }}</textarea>
                <button type="submit" class="btn btn-default">Add Product</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#saleSelect').change(function() {
                if ($(this).val() == "1") {
                    $('#saleInputDiv').show();
                } else {
                    $('#saleInputDiv').hide();
                    $('#saleInput').val(''); // Clear the input value when it's hidden
                }
            });
        });
    </script>
@endsection
