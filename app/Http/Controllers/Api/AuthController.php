<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;
use App\UserDetail;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->status = 'client';
        $user->password = bcrypt($request->password);

        if($user->save()){
          $detail = new UserDetail($request->user_detail);
          $user->detail()->save($detail);
          return response([
              'status' => 'success',
              'data' => $user
          ], 200);

        }else{
          return response([
              'title' => 'Fail to create user',
              'message' => 'Fail to create user'
              'data' => $user
          ], 400);
        }

    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $this->validate($request, [
          'email' => 'email|required',
          'password' => 'required'
        ]);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response([
                'title' => 'Invalid Credentials',
                'message' => 'Invalid Credentials'
            ], 400);
        }
        return response([
            'status' => 'success',
            'token' => $token
        ]);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response([
            'status' => 'success',
            'msg' => 'You have successfully logged out.'
        ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response([
                'title' => 'Failed to logout',
                'message' => 'Failed to logout, please try again.'
            ]);
        }
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

}
