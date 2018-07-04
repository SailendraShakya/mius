<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Response;
use Twilio;

use App\Http\Controllers\Controller;

class SosController extends Controller
{
    public function initiate()
    {
        Twilio::message('+9779845886831', 'k cha hal khabar');
        die('testing');
        /*$authUser = JWTAuth::parseToken()->authenticate();
        $user = User::find($authUser->id);
        if(!$user){
            return Response::json(['status' => 'User not found',], 400);
        }
        $detail = $user->detail;
        $detail->sos_status = 1;

        if($detail->save())
        {
            foreach ($user->guardians as $key => $guardian) {
              dd($guardian->phone);
            }
            return Response::json(['message'=>'Sos successfully initiated','data'=>$detail], 200);
        }else{
          return Response::json(['message'=>'Something went wrong while initiating sos','data'=>$user], 400);
        }*/


    }
}
