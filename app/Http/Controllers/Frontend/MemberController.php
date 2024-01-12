<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use  App\Http\Requests\MemberRequest;
use App\Models\category;
use App\Models\brand;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
      $this->middleware('checklogin1');
    }
    public function index()
    {
        $data = Auth::user()->toArray();
        $data['password'] = Auth::user()->getAuthPassword();
        // dd($data);
        return view('Frontend.member.account', compact('data'));

    }
    public function product()
    {
        return view('Frontend.member.my-product');
    }
   

    public function indexcategory()
    {
        $data= category::all()->toArray();
        return view('Frontend.category.list',compact('data'));
    }





    public function getadd()
    {
        return view('Frontend.category.add');
    }
    public function postadd(Request $request){
        $data= $request->all();
       if(category::create($data)){
        return redirect('/Frontend/account/category')->with('success', ('success.'));
       }
       else{
        'thất bại';
       }
    }


    public function getupdatecategory(string $id){
        $data=category::find($id)->toArray();
        // dd($data);
        return view('Frontend.category.edit', compact('data'));
    }

    
    public function postupdatecategory(Request $request)
    {
     $category = category::find($request->id);
     $data=$request->all();   
     if($category->update($data)){
        return redirect('/Frontend/account/category')->with('success', ('success.'));
       }
       else{
        'thất bại';
       }
    }


    public function destroycategory(string $id){
        category::destroy($id);
        return redirect('/Frontend/account/category')->with('success', ('success.'));
    }







    public function indexbrand()
    {
        $data= brand::all()->toArray();
        return view('Frontend.brand.list',compact('data'));
    }

    public function getaddbrand()
    {
        return view('Frontend.brand.add');
    }
    public function postaddbrand(Request $request){
        $data= $request->all();
       if(brand::create($data)){
        return redirect('/Frontend/account/brand')->with('success', ('success.'));
       }
       else{
        'thất bại';
       }
    }
    public function getupdatebrand(string $id){
        $data=brand::find($id)->toArray();
        // dd($data);
        return view('Frontend.brand.edit', compact('data'));
    }
    public function postupdatebrand(Request $request)
    {
     $brand = brand::find($request->id);
     $data=$request->all();   
     if($brand->update($data)){
        return redirect('/Frontend/account/brand')->with('success', ('success.'));
       }
       else{
        'thất bại';
       }
    }
    public function destroybrand(string $id){
        brand::destroy($id);
        return redirect('/Frontend/account/brand')->with('success', ('success.'));
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
    public function update(MemberRequest $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $data = $request->all();
        
        $file = $request->avatar;

        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }

        if ($data['password'] && $data['password'] == $data['password']) {
            $data['password'] = bcrypt($data['password']);


        } else {
            $data['password'] = $user->password;
        }



        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', ('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');

        }
        



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
