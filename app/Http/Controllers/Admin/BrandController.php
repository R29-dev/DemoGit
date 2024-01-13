<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= brand::all()->toArray();
        return view('admin.brand.list',compact('data'));
    }
    public function getadd()
    {
        return view('admin.brand.add');
    }

    public function postadd(Request $request)
    {
            $data= $request->all();
        if(brand::create($data)){
         return redirect('admin/brand')->with('success', ('success.'));
        }
        else{
         'thất bại';
        }
    }

    public function getupdate(string $id){
        $data=brand::find($id)->toArray();
        // dd($data);
        return view('admin.brand.edit', compact('data'));
    }
    public function postupdate(Request $request)
    {
     $category = brand::find($request->id);
     $data=$request->all();   
     if($category->update($data)){
        return redirect('/admin/brand')->with('success', ('success.'));
       }
       else{
        'thất bại';
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         brand::destroy($id);
        return redirect('admin/brand')->with('success', ('success.'));
    }
}
