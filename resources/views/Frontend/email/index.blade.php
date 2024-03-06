<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Điều chỉnh các thẻ head nếu cần -->
</head>
<body>
    @foreach($data['giohang'] as $product)
        <p>Tên sản phẩm: {{ $product['name'] }}</p>
        <p>Số lượng: {{ $product['qty'] }}</p>
        <p>Giá: {{ $product['price'] }}</p>
        <p>Total: ${{ $product['total'] }}</p> <!-- Hiển thị tổng giá trị của từng sản phẩm -->
        <!-- Thêm chi tiết sản phẩm khác nếu cần -->
        <hr>
    @endforeach

    <p>Total: ${{ $data['total'] }}</p> <!-- Hiển thị tổng giá trị của toàn bộ giỏ hàng -->
</body>
</html>
