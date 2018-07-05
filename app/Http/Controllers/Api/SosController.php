<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Response;
use Twilio\Rest\Client;

use App\Http\Controllers\Controller;

class SosController extends Controller
{
    protected function send_sms($phone, $message)
    {
      $sid = 'AC25515f80b4a25b6bfd3771313ce3678b';
      $token = 'bd934a268c8ba41de7f13d89c1292dd2';
      $client = new Client($sid, $token);
      try{
        $client->messages->create($phone,
           array(
            'from' => '+1 508-671-7066',
             'body' => $message
          )
        );
        $s = true;
      }catch(Exception $e){
        $s = false;
      }
      return $s;
    }

    public function initiate()
    {
      $authUser = JWTAuth::parseToken()->authenticate();
      $user = User::find($authUser->id);
      if(!$user){
          return Response::json(['status' => 'User not found',], 400);
      }

      $detail = $user->detail;
      $detail->sos_status = 1;
      if($detail->save())
      {
        foreach ($user->guardians as $key => $guardian) {
          $phone = $guardian->phone;
          $message = "Sos initate for this user";
          // $this->send_sms('+9779841398441', 'Testing');
        }
        return Response::json(['message'=>'Sos initiate successfully','data'=>$user], 200);

      }else{
        return Response::json(['message'=>'Error while initiating sos','data'=>$user], 400);
      }
    }
}
