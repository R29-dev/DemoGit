<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\blog;
use Illuminate\Http\Request;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = blog::all()->toArray();
        return view('admin.blog.list', compact('data'));
    }
    public function getadd()
    {
        return view('admin.blog.add');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(BlogRequest $request)
    {
        $data = $request->all();
        $file = $request->Image;

        if (!empty($file)) {
            $data['Image'] = $file->getClientOriginalName();
        } else {
            $data['Image'] = "";
        }

        if (blog::create($data)) {
            if (!empty($file)) {
                $file->move('upload/blog/image', $file->getClientOriginalName());
            }
            return redirect('/admin/blog')->with('success', ('success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');

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

    public function getupdate(string $id)
    {
        $data=blog::find($id)->toArray();
        return view('admin.blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request)
{
    $blog = Blog::find($request->id);
    $data = $request->all();
    $file = $request->Image;
    if (!empty($file)) {
        $data['Image'] = $file->getClientOriginalName();
    }

    if (!$request->filled('Description')) {
        unset($data['Description']);
    }

    if ($blog->update($data)) {
        if(!empty($file)) {
            $file->move('upload/blog/image', $file->getClientOriginalName());
        }
        return redirect('/admin/blog')->with('success', 'Success.');
    } else {
        return 'Thất bại';
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        blog::destroy($id);
        return redirect('/admin/blog')->with('success', ('success.'));  
    }
}
