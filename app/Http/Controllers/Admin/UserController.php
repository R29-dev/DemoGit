<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\category;
use App\Models\brand;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } /**
      * Display a listing of the resource.
      */

    public function index()
    {
        //sad
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
    public function show()
    {
      
        $users = Auth::user();
        $data= country::all()->toArray();
        return view('admin.user.pages-profile', compact('users','data'));
        

    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
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
        ;



    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
