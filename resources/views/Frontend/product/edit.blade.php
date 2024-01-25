@extends('Frontend.layouts.app')
@section('content')
    <div class="blog-post-area">
        <h2 class="title text-center">Product</h2>
        <div class="signup-form"><!--sign up form-->
            <h2>Product</h2>
            <form action="{{ url('/Frontend/account/my-product/edit/') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                <input type="text" placeholder="Name" name="name" value="{{ old('name', $data['name']) }}" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <input type="number" placeholder="Price" name="price" value="{{ old('price', $data['price']) }}" />
                @error('price')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                <select class="form-select" name="id_category" aria-label="Default select example">
                    <option selected>Please choose category</option>
                    @foreach ($category as $item)             
                    <option value="{{ $item['id'] }}" {{ ($data['id_category'] == $item['id']) ? "selected" : "" }}>
                        {{ old($item['name'], $item['name']) }}
                    </option>
                @endforeach
                
                </select>
                
                </select>
                <select class="form-select" name="id_brand" aria-label="Default select example">
                    <option selected>Please choose brand</option>
                    @foreach ($brand as $item)
                        <option value="{{ $item['id'] }}"{{ ($data['id_brand']==$item['id']) ? "selected" : ""}}>   {{ old($item['name'], $item['name']) }}</option>
                    @endforeach
                </select>
                <select class="form-select" name="sale" id="saleSelect" aria-label="Default select example">
                    <option selected>Sale</option>
                    <option value="0">New</option>
                    <option value="1">Sale</option>
                </select>
                <div class="row" id="saleInputDiv" style="display: none;">
                    <div class="col-sm-3">
                        <input type="number" placeholder="0" name="sale_input" value="" id="saleInput" />
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" style="font-size: 20px" class="form-text">% </span>
                    </div>
                </div>
                <input type="text" placeholder="Company profile" name="company"
                    value="{{ old('company', $data['company']) }}" />
                @error('company')
                    <p>{{ $message }}</p>
                @enderror
                <br>

                <input type="file" name="hinhanh[]" multiple>
                @error('hinhanh')
                    <p>{{ $message }}</p>
                @enderror
                <br>
                @php
                $hinhanhArray = json_decode($data['hinhanh'], true);
            @endphp
            
            @foreach ($hinhanhArray as $image)
                <img style="" src="{{ asset('/upload/product/' . $image) }}" alt="Current Image" width="80">
                <input type="checkbox" name="hinhxoa[]" value="{{ $image }}">
            @endforeach
            
                {{-- <input type="number" name="" id=""> --}}
                {{-- @foreach ($data as $item)
                <img src="{{ $data['hinhanh'] }}" alt="Current Image" width="100">
                <input type="checkbox"
                @endforeach
                      --}}
                {{-- <br><br> --}}

                <textarea id="" cols="30" rows="10" name="detail" placeholder="Detail">{{ old('detail', $data['detail']) }}</textarea>
                <button type="submit" class="btn btn-default">Update Product</button>
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
