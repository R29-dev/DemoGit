@extends('Frontend.layouts.app')
@section('content')
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr style="background-color: orange; color: white;" class="cart_menu">
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
                            $subtotal = $price * $product['qty'];
                            $totalPrice += $subtotal; // Thay đổi ở đây
                            $imagesArray = json_decode($product['hinhanh'], true);
                            $firstImage = isset($imagesArray[0]) ? $imagesArray[0] : null;

                        @endphp

                        <tr>
                            <td class="cart_product">
                                @if ($firstImage)
                                    <a href=""><img width="150px" src="{{ asset('upload/product/' . $firstImage) }}"
                                            alt=""></a>
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
                                <p class="cart_total_price" id="cart_total_{{ $product['id'] }}">{{ $subtotal }}$</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-product-id="{{ $product['id'] }}"><i
                                        class="fa fa-times"></i></a>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <h3 style="color: #2B7CD3;">Không có sản phẩm nào</h3>
                        </td>
                    </tr>
                @endif


            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Sự kiện khi click vào nút tăng số lượng
            $('.cart_quantity_up').on('click', function() {
                var productId = $(this).data('product-id');
                var quantityInput = $(this).siblings('.cart_quantity_input');
                var currentQuantity = parseInt(quantityInput.val());

                // Tăng số lượng lên 1
                var newQuantity = currentQuantity + 1;

                // Cập nhật giá trị trong ô input
                quantityInput.val(newQuantity);

                // Gọi hàm để cập nhật giỏ hàng qua Ajax
                updateCart(productId, newQuantity);
            });

            // Sự kiện khi click vào nút giảm số lượng
            $('.cart_quantity_down').on('click', function() {
                var productId = $(this).data('product-id');
                var quantityInput = $(this).siblings('.cart_quantity_input');
                var currentQuantity = parseInt(quantityInput.val());

                // Giảm số lượng đi 1, nhưng không được nhỏ hơn 1
                var newQuantity = Math.max(currentQuantity - 1, 1);

                // Cập nhật giá trị trong ô input
                quantityInput.val(newQuantity);

                // Gọi hàm để cập nhật giỏ hàng qua Ajax
                updateCart(productId, newQuantity);
            });

            // Lấy giá trị quantity từ local storage khi trang được tải
            $('.cart_quantity_input').each(function() {
                var productId = $(this).closest('tr').find('.cart_quantity_up').data('product-id');
                var storedQuantity = localStorage.getItem('cart_quantity_' + productId);

                if (storedQuantity !== null) {
                    // Nếu có giá trị trong local storage, cập nhật giá trị quantity
                    $(this).val(storedQuantity);
                    updateTotal(productId, storedQuantity);
                }
            });
        });

        function updateCart(productId, newQuantity) {
            // Gửi request Ajax đến Laravel Controller
            $.ajax({
                url: '{{ route('updatecart') }}',
                method: 'POST',
                data: {
                    productId: productId,
                    quantity: newQuantity,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log('Giỏ hàng đã được cập nhật thành công');


                    // Lưu giá trị quantity vào local storage
                    localStorage.setItem('cart_quantity_' + productId, newQuantity);

                    // Cập nhật giá trị total sau khi cập nhật giỏ hàng
                    updateTotal(productId, newQuantity);

                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi cập nhật giỏ hàng:', error);
                }
            });
        }

        function updateTotal(productId, newQuantity) {
            // Lấy giá trị price từ thẻ HTML
            var price = parseFloat($('#cart_total_' + productId).closest('tr').find('.cart_price p').text().replace('$',
                ''));
            // Tính toán total mới
            var newTotal = price * newQuantity;

            // Cập nhật giá trị total trong thẻ HTML
            $('#cart_total_' + productId).text(newTotal + '$');
            // Cập nhật tổng giá trị của toàn bộ giỏ hàng
            updateCartTotal(); // Thêm dòng nàyF
            // Lưu giá trị total vào local storage (nếu cần)
            // localStorage.setItem('cart_total_' + productId, newTotal);
           
        }
        function updateCartTotal() {
            // Lấy tất cả các giá trị total và tính tổng
            var totalValues = $('.cart_total_price').map(function() {
                return parseFloat($(this).text().replace('$', ''));
            }).get();

            var cartTotal = totalValues.reduce(function(a, b) {
                return a + b;
            }, 0);

            // Cập nhật giá trị tổng trong thẻ HTML
            $('#cart-total').text(cartTotal + '$');
        }



        $('.cart_quantity_delete').on('click', function() {
            var productId = $(this).data('product-id');

            // Lưu trữ phần tử sản phẩm để có thể xóa nó sau khi xóa thành công
            var productRow = $(this).closest('tr');

            // Gửi Ajax request để xóa sản phẩm
            $.ajax({
                url: '{{ route('deleteproduct') }}',
                method: 'POST',
                data: {
                    productId: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log('Sản phẩm đã được xóa thành công');

                    // Ẩn hoặc xóa phần tử sản phẩm trên màn hình
                    productRow.remove();

                    // Hoặc dùng để ẩn phần tử nếu bạn muốn giữ lại trong DOM
                    // productRow.hide();
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi xóa sản phẩm:', error);
                }
            });
        });
    </script>


    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span  id="cart-total">$</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

    <!-- Đặt mã JavaScript sau đoạn HTML của bạn -->



@endsection
