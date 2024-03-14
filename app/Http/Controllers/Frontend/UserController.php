<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\MemberLoginRequest;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\product;
use App\Models\brand;

class UserController extends Controller
{
    public function __construct()
    {
        
    } /**
      

    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     // Kiểm tra xem minPrice và maxPrice có tồn tại không
    //     if ($request->filled('minPrice') && $request->filled('maxPrice')) {
    //         $minPrice = $request->minPrice;
    //         $maxPrice = $request->maxPrice;
    
    //         // Truy vấn các sản phẩm trong khoảng giá minPrice và maxPrice
    //         $products = Product::where('price', '>=', $minPrice)
    //             ->where('price', '<=', $maxPrice)
    //             ->get();
    //     } else {
    //         // Nếu không có minPrice và maxPrice, truy vấn tất cả các sản phẩm
    //         $products = product::all()->toArray();
        
            
    //     }
    
    //     // Trả về dữ liệu dưới dạng JSON
    //     return response()->json(['data' => $products]);
    // }
        
    
public function index()
{
    $products = product::all()->toArray();
   
   

    // dd($products);
    return view("Frontend.home.index", compact('products'));
}

  

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(UsersRequest $usersRequest)
    {
        $data = $usersRequest->all();
        $data['level'] = 0;
        $data['password'] = bcrypt($data['password']);

        if (User::create($data)) {
            return redirect()->back()->with('success', ('Create profile success.'));
        } else {
            return redirect()->back()->withErrors('Create profile error.');
        }

    }
    public function login(MemberLoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }
        if (Auth::attempt($login, $remember)) {
            return redirect()->route('index');
           
        } else {
            return redirect()->back()->withErrors(['loginError' => 'Email or password is not correct.']);
        }
    }
    public function logout(){
      Auth::logout();
      return redirect()->route('logins');
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
    public function show()
    {
       
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getproductdetail(){
        $product= product::all()->toArray();
        $brand = brand::all()->toArray();
    // dd($brand);
        return view('Frontend.product.my-product-detail', compact('product','brand'));
   }
}
