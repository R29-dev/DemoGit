<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= category::all()->toArray();
        return view('admin.category.list',compact('data'));
    }
    public function getadd()
    {
        return view('admin.category.add');
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function postadd(Request $request)
    {
            $data= $request->all();
        if(category::create($data)){
         return redirect('admin/category')->with('success', ('success.'));
        }
        else{
         'thất bại';
        }
    }
    public function getupdate(string $id){
        $data=category::find($id)->toArray();
        // dd($data);
        return view('admin.category.edit', compact('data'));
    }
    public function postupdate(Request $request)
    {
     $category = category::find($request->id);
     $data=$request->all();   
     if($category->update($data)){
        return redirect('/admin/category')->with('success', ('success.'));
       }
       else{
        'thất bại';
       }
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
         category::destroy($id);
        return redirect('admin/category')->with('success', ('success.'));
    }
}
