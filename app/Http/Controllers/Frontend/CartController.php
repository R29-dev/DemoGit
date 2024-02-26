<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function addToCart(Request $request)
    {
        $id = $request->id;
        // dd($product);
        if (!Session::has('giohang')) {
            Session::put('giohang', []);
        }

        // Kiểm tra xem sản phẩm với ID đã cho có trong giỏ hàng chưa
        if (Session::has('giohang.' . $id) && Session::get('giohang.' . $id)['id'] == $id) {
            $row = Session::get('giohang.' . $id);
            $row['qty'] = $row['qty'] + 1;
            Session::put('giohang.' . $id, $row);
        } else {
            // Lấy thông tin sản phẩm từ cơ sở dữ liệu
            //  $product = Product::find($id)->toArry();
            $product = DB::table('products')->where('id', $id)->first();


            if ($product) {
                $product->qty = 1;
                Session::put('giohang.' . $id, (array) $product);
            }
        }

        return Session::get('giohang');


    }

    public function index()
    {

        $giohang = session('giohang', []);
        // $product=product::all();
        // dd($product);
        return view('Frontend.cart.cart', compact('giohang'));

    }



    public function update(Request $request)
    {
        try {
            $productId = $request->input('productId');
            $quantity = $request->input('quantity');

            // Thực hiện logic cập nhật giỏ hàng ở đây
            $cart = session('giohang', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['qty'] = $quantity;
                session(['giohang' => $cart]);

                // Lấy giá và số lượng từ sản phẩm đã cập nhật
                $price = str_replace("$", '', $cart[$productId]['price']);
                $price = (float) $price;
                $newQuantity = $cart[$productId]['qty'];

                // Tính toán giá trị mới
                $newTotal = $price * $newQuantity;

                // Trả về giá trị mới
                return response()->json(['totalPrice' => $newTotal]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deleteProduct(Request $request)
    {
        try {
            $productId = $request->input('productId');

            // Thực hiện logic xóa sản phẩm khỏi giỏ hàng ở đây
            $cart = session('giohang', []);

            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session(['giohang' => $cart]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

// Xử lý logic thêm sản phẩm vào giỏ hàng và trả về dữ liệu JSON
//  return response()->json([
//      'price' => $product->price,
//      'hinhanh' => $product->hinhanh,
//      'name' => $product->name,
//      'qty' => 1,
//  ]);