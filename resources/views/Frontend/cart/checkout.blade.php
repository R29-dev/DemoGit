@extends('Frontend.layouts.app')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->




            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                                <a class="btn btn-primary" href="">Get Quotes</a>
                                <a class="btn btn-primary" href="{{ route('test') }}">Continue</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty(session('giohang')))
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach (session('giohang') as $product)
                                @php
                                    $price = str_replace("$", '', $product['price']);
                                    $price = (float) $price;
                                    $totalPrice = $price * $product['qty'];
                                    $imagesArray = json_decode($product['hinhanh'], true);
                                    $firstImage = isset($imagesArray[0]) ? $imagesArray[0] : null;

                                @endphp



                                <tr>
                                    <td class="cart_product">
                                        @if ($firstImage)
                                            <a href=""><img width="150px"
                                                    src="{{ asset('upload/product/' . $firstImage) }}" alt=""></a>
                                        @endif
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $product['name'] }}</a></h4>
                                        <p>Web ID: {{ $product['id'] }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ $product['price'] }}$</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <a class="cart_quantity_up" data-product-id="{{ $product['id'] }}"> + </a>
                                            <input class="cart_quantity_input" type="text" name="quantity"
                                                value="{{ $product['qty'] }}" autocomplete="off" size="2">
                                            <a class="cart_quantity_down" data-product-id="{{ $product['id'] }}"> - </a>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price" id="cart_total_{{ $product['id'] }}">
                                            {{ $totalPrice }}$</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" data-product-id="{{ $product['id'] }}"><i
                                                class="fa fa-times"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h3 style="color: #2B7CD3;">Không có sản phẩm nào</h3>
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
