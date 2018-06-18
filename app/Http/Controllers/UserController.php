<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::all();
    	$data['users'] = $users;
        return view('user.list', $data);
    }

    public function edit(User $user)
    {
        if($user->id != Auth::user()->id){
           return view('401');
        }

        $user = User::findOrFail($user)[0];
        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {   
        if($user->id != Auth::user()->id){
           return view('401');
        }

        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required|min:6'
        ]);

        $user->name = request('name');
        $user->password = bcrypt(request('password'));
        $user->save();
        return back();
    }
}
