<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;
use App\Friend;
use Response;

class FriendController extends Controller
{
    public function index()
    {
        try {
            $authUser = JWTAuth::parseToken()->authenticate();
            $user = User::find($authUser->id);
            $friends = $user->friends;
            return Response::json(['status'=>'sucess','data'=>$friends], 200);
        } catch (Exception $e) {
            return Response::json(['status' => 'error',], 400);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $authUser = JWTAuth::parseToken()->authenticate();
            $user = User::find($authUser->id);
            $this->validate($request, [
              'name' => 'required',
              'email' => 'required|email',
              'number' => 'required',
              'description' => 'required',
            ]);
            $friend = $user->friends()->create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            return Response::json(['status'=>'sucess','data'=>$friend], 200);

        }catch (Exception $e) {
            return Response::json(['status' => 'error'], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $friend = Friend::find($id);
        if(!$friend){
          return Response::json(['message' => 'No user with given id'], 400);
        }
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'number' => 'required',
          'description' => 'required',
        ]);

        $friend->name = $request->name;
        $friend->email = $request->email;
        $friend->number = $request->number;
        $friend->description = $request->description;
        $friend->created_at = now();
        $friend->updated_at = now();

        if($friend->save()){
            return Response::json(['message' => 'Successfully updated'], 200);
        }else{
            return Response::json(['message' => $friend->errors()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $friend = Friend::find($id);
        if($friend->delete())
        {
          return Response::json(['message' => 'Successfully Deleted'], 200);
        }else{
          return Response::json(['message' => $friend->errors()], 400);
        }
    }
}
