<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\brand;
use App\Http\Requests\ProductRequest;
// use Intervention\Image\Facades\Image as ImageFacade; // Add this line
use Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=product::all();
        foreach ($data as $item) {
            $item['hinhanh'] = json_decode($item['hinhanh'], true);
        }
        return view('Frontend.product.my-product' ,compact('data'));
        // dd($data);
        
       
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        $data = category::all()->toArray();
         
        $datas = brand::all()->toArray();
        return view('Frontend.product.add', compact('data','datas'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = [];
        $datas = $request->all();
        if ($request->hasfile('hinhanh')) {
            foreach ($request->file('hinhanh') as $image) {
                $name = $image->getClientOriginalName();
                $name_2 = "hinh50_" . $image->getClientOriginalName();
                $name_3 = "hinh200_" . $image->getClientOriginalName();
        
                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);
        
               
                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(50, 70)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);
                // Add the image name to the data array
                $data[] = $name;
            }
        }
        
        $datas['hinhanh'] = json_encode($data);
        
        
        if(product::create($datas)){
            return redirect('Frontend/account/my-product')->with('success', ('Create profile success.'));
           }
    }
    public function edit(string $id)
    {
        $data=product::find($id)->toArray();
        // dd($data);
        $category = category::all()->toArray();
         
        $brand = brand::all()->toArray();

// dd($category);
        return view('Frontend.product.edit', compact('data','category','brand'));
     
    }

    
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
   

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
}
