@extends('Frontend.layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
    </head>

    <body>

        <h1>Search Results for '{{ $searchTerm }}'</h1>
        <div class="col-sm-12 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Features Items</h2>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        @php
                            $items = json_decode($product['hinhanh'], true);
                        @endphp
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        {{-- <input type="hidden" name="id" id="" value="{{ $item['id'] }}"> --}}
                                        <img src="{{ asset('/upload/product/' . $items[0]) }}" alt="" />
                                        <h2>{{ $product['price'] }}</h2>
                                        <p>{{ $product['name'] }}</p>
                                        <a href="" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    {{-- <a href="{{ url('/Frontend/account/my-product-detail/') }}"> --}}
                                    <div class="product-overlay">
                                        <div class="overlay-content">

                                            <h2>{{ $product['price'] }}</h2>
                                            <p>{{ $product['name'] }}</p>
                                            <a href="#" id="{{ $product['id'] }}"
                                                class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                        </div>
                                    </div>
                                    </a>
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

        </div><!--features_items-->
    @else
      <h2 style="color: #2B7CD3"> Không tìm thấy sản phẩm nào</h2>
        @endif
    </body>

    </html>
@endsection
