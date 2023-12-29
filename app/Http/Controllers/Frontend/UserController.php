<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\MemberLoginRequest;
use Illuminate\Support\Facades\Auth;


use App\Models\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } /**
      

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
    public function create(UsersRequest $usersRequest)
    {
        $data = $usersRequest->all();
        $data['level'] = 0;
        $data['password'] = bcrypt($data['password']);

        if (User::create($data)) {
            return redirect()->back()->with('success', ('Create profile success.'));
        } else {
            return redirect()->back()->withErrors('Create profile error.');
        }

    }
    public function login(MemberLoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }
        if (Auth::attempt($login, $remember)) {
            return redirect('/Frontend');
        } else {
            return redirect()->back()->withErrors(['loginError' => 'Email or password is not correct.']);
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
