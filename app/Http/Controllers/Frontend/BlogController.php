<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\rate;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {



    }

    public function index()
    {
        $data = blog::paginate(3);

        return view('Frontend.blog.blog', compact('data'));
    }

    public function blog_detail(string $id)
    {
        $data = blog::find($id)->toArray();
        $data['rate'] = "";


        if (Auth::check()) {
            $id_user = Auth::id();
            $latestRate = Rate::where('id_blog', $id)
                ->where('id_user', $id_user)
                ->latest('created_at')
                ->first()->toArray();
          
         
           $data['rate']=$latestRate['rate'];



            
        }



        return view('Frontend.blog.blog-detail', compact('data'));
    }

//    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        if (rate::create($data)) {
            return response()->json('Rating data received successfully', 200);
        } else {
            return response()->json('Rating data false', 500);
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
        //
    }
}






