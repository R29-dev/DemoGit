<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       $data= $request->all();
       if(country::create($data)){
        return redirect('/admin/country')->with('success', ('success.'));
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
        $data = country::all()->toArray();
        return view('admin.country.list', compact('data'));

    }

    public function form()
    {
       
        return view('admin.country.formbasic');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $data= country::all()->toArray();
        return view('admin.profile',compact('data'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function getupdate( string $id)
    {
        $data=country::find($id)->toArray();
        return view('admin.country.edit', compact('data'));
    }
    public function update(Request $request)
    {
     $country = Country::find($request->id);
     $data=$request->all();   
     if($country->update($data)){
        return redirect('/admin/country')->with('success', ('success.'));
       }
       else{
        'thất bại';
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        country::destroy($id);
        return redirect('/admin/country')->with('success', ('success.'));   
    }
}
