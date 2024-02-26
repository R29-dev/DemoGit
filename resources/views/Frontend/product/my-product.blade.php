@extends('Frontend.layouts.app')
@section('content')
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead >
                <tr class="cart_menu " style="background-color: #FE980F; color: white; font-weight: bold">
                    <td class="image">Image</td>
                    <td class="description">Name</td>
                    <td class="price">Price</td>
                    {{-- <td class="quantity">Quantity</td>  --}}
                    <td class="total " colspan="2">Action</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="cart_product">
                            @if (isset($item['hinhanh'][0]))
                                <a href=""><img width="200px" src="{{ asset('upload/product/' . $item['hinhanh'][0]) }}"
                                        alt=""></a>
                            @endif

                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item['name'] }}</a></h4>


                            <p>Web ID: {{ $item['id'] }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ $item['price'] }}$</p>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"></p>
                        </td>
                        <td class="edit">
                            <a class="" href="{{ url('/Frontend/account/edit/'.$item['id']) }}"><i class="m-r-10 mdi mdi-grease-pencil"></i> Edit</a>

                        </td>
                        <td class="delete">
                            <a class="" href="{{  url('/Frontend/account/delete/'.$item['id'])  }}"><i class="m-r-10 mdi mdi-grease-pencil"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div style="text-align: right; margin: 10px">
            <button style="background-color: #FE980F;font-size: 20px; border: 0;"> <a
                    class="text-white"style="color: white;" href="{{ url('/Frontend/account/add') }}">Add New
                </a></button>
        </div>
    </div>
@endsection
