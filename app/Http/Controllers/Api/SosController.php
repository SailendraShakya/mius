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
        // initialize message array
        $message_array = array(
        'sender_id'     => 'AC2e761e2358b8df4165aa1e4df22e8d72',
        'sender_secret' => '8df54f39830ff2bc9c2f1aa2f524bc8e',
        'receiver_mobile' => '+9779841398441',
        'otp'     =>'325456',
        'sender' => '+16145004382'
        );

        // This will send OTP only
        $sms_response = Twilio::message($message_array,$op="otp only", false, true,  false ); // otp

        return response()->json($sms_response,200);




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
