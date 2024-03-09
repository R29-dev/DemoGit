@extends('Frontend.layouts.app')

@section('content')
<style>
    .search-form-horizontal .form-group {
    display: inline-block;
    margin-right: 5px;
}

.search-form-horizontal button {
    display: inline-block;
}

</style>
    <div class="col-sm-12 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">All Products</h2>
            <!-- Menu tìm kiếm -->
            <form action="{{ route('searchadvanced') }}" method="GET" class="search-form-horizontal">
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="price">Giá tiền</label>
                    <select name="price" class="form-control">
                        <option value="">Choose price</option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Chọn danh mục</label>
                    <select name="category" class="form-control">
                        <option value="">Category</option>
                        @foreach ($categories as $category) 
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Chọn thương hiệu</label>
                    <select name="brand" class="form-control">
                        <option value="">Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                     @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Chọn trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="">Status</option>
                        <option value="1">Hoạt động</option>
                        <option value="0">Ngừng hoạt động</option>
                    </select>
                </div>
                <button type="submit" style="background-color: orange; color: white;" class="btn btn-default">Tìm kiếm</button>
            </form>

            <div class="row">
                @foreach ($products as $item)
                    @php
                        $images = json_decode($item['hinhanh'], true);
                        $firstImage = isset($images[0]) ? $images[0] : null;
                    @endphp

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('/upload/product/' . $firstImage) }}" alt="" />
                                    <h2>{{ $item['price'] }}</h2>
                                    <p>{{ $item['name'] }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ $item['price'] }}</h2>
                                        <p>{{ $item['name'] }}</p>
                                        <a href="#" id="{{ $item['id'] }}" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
