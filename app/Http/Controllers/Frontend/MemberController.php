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
