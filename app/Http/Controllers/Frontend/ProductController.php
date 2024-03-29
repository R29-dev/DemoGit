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
use Illuminate\Support\Facades\Log;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = product::all();
        foreach ($data as $item) {
            $item['hinhanh'] = json_decode($item['hinhanh'], true);
        }
        return view('Frontend.product.my-product', compact('data'));
        // dd($data);


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $data = category::all()->toArray();

        $datas = brand::all()->toArray();
        return view('Frontend.product.add', compact('data', 'datas'));

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


        if (product::create($datas)) {
            return redirect('Frontend/account/my-product')->with('success', ('Create profile success.'));
        }
    }
    public function edit(string $id)
    {
        $data = product::find($id)->toArray();
        // dd($data);
        $category = category::all()->toArray();

        $brand = brand::all()->toArray();

        // dd($category);
        return view('Frontend.product.edit', compact('data', 'category', 'brand'));

    }






    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datasss = [];
        $hinhxoa = $request->input('hinhxoa') ? $request->input('hinhxoa') : [];
        $hinhmoi = $request->hasFile('hinhanh') ? $request->file('hinhanh') : [];
        $tonghinhxoa = 0;
        $tonghinhmoi = 0;
        if ($hinhxoa) {
            $tonghinhxoa = count($hinhxoa);
        }
        if ($hinhmoi) {
            $tonghinhmoi = count($hinhmoi);
        }
        $data = $request->all();
        $data['hinhanhcu'] = product::find($id)->hinhanh;
        $hinhanhs = count(json_decode($data['hinhanhcu'], true)) - $tonghinhxoa;
        if ($hinhanhs + $tonghinhmoi > 3) {
            return redirect()->back()->with('error', ('Vui lòng chọn tối đa 3 hình.'));
        } else {
            $anhconlai = array_diff(json_decode($data['hinhanhcu'], true), $hinhxoa);
            foreach ($anhconlai as $filename) {
                $datasss[] = $filename;
            }
            foreach ($hinhxoa as $filename) {
                // Construct the full path to the file
                $filePath = public_path('upload/product/') . '/' . $filename;
                if (file_exists($filePath)) {
                    // Attempt to delete the file
                    unlink($filePath);
                }

                // You might also want to remove the filename from the database or perform other necessary operations
            }
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
                    $datasss[] = $name;
                }
            }
            $data['hinhanh'] = json_encode($datasss);
            $product = Product::find($id);
            if ($product->update($data)) {
                return redirect('Frontend/account/my-product')->with('success', ('Create profile success.'));
            }



        }





    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Sử dụng SQL LIKE để tìm kiếm theo tên
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')->get();

        return view('Frontend.product.search', compact('products', 'searchTerm'));
    }

    public function searchadvanced(Request $request)
    {
        $query = Product::query();

        $categories = Category::all();
        $brands = Brand::all();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('price')) {
            // Tìm kiếm theo khoảng giá nếu chỉ có một giá trị duy nhất
            $priceRange = explode('-', $request->input('price'));
            $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        }

        if ($request->filled('category')) {
            $categoryId = $request->input('category');
            $query->where('id_category', $categoryId);
        }

        if ($request->filled('brand')) {
            $brandId = $request->input('brand');
            $query->where('id_brand', $brandId);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $products = $query->paginate(10);

        return view('Frontend.product.searchadvanced', compact('products', 'categories', 'brands'));
    }



    public function destroy(string $id)
    {
        product::destroy($id);
        return redirect('Frontend/account/my-product')->with('success', ('success.'));
    }

    public function getproductdetail()
    {
        $product = product::all()->toArray();
        $brand = brand::all()->toArray();
        // dd($brand);
        return view('Frontend.product.my-product-detail', compact('product', 'brand'));
    }
    public function searchprice(request $request)
    {
      
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;
        $products = Product::where('price', '>=', $minPrice)
            ->where('price', '<=', $maxPrice)
            ->get();
            return response()->json(['data' => $products]); 
    }
}