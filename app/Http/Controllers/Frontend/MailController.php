<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Mail;
use App\Mail\MailNotify;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        $giohang = session('giohang') ?? [];
    
        // Tính tổng giá trị của từng sản phẩm
        foreach ($giohang as &$product) {
            $price = str_replace("$", '', $product['price']);
            $price = (float) $price;
            $product['total'] = $price * $product['qty'];
        }
    
        $data = [
            'subject' => "VANCONG",
            'body' => "Hello, this is my email",
            'giohang' => $giohang,
            'total' => $this->calculateTotal($giohang), // Tính tổng giá trị của toàn bộ giỏ hàng
        ];
    
        try {
            Mail::to('congdoan.29042004@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great! Check your mailbox']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    // Hàm tính tổng giá trị của giỏ hàng
    private function calculateTotal($cart)
    {
        $total = 0;
    
        foreach ($cart as $product) {
            $total += $product['total'];
        }
    
        return $total;
    }
    
}
