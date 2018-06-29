<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;
use App\Family;
use Response;
use Illuminate\Support\Facades\Storage;

class FamilyController extends Controller
{
    public function index()
    {
        try {
            $authUser = JWTAuth::parseToken()->authenticate();
            $user = User::find($authUser->id);
            $families = $user->families;
            return Response::json(['status'=>'sucess','data'=>$families], 200);
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
              'phn_code' => 'required',
              'relation' => 'required',
              'beep_activator' => 'required',
              'opt' => 'required',
            ]);
            $family = $user->families()->create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'phn_code' => $request->phn_code,
            'relation' => $request->relation,
            'beep_activator' => $request->beep_activator,
            'opt' => $request->opt,
            'created_at' => now(),
            'updated_at' => now()
            ]);

            return Response::json(['status'=>'sucess','data'=>$family], 200);

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
        $family = Family::find($id);
        if(!$family){
          return Response::json(['message' => 'No user with given id'], 400);
        }
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'number' => 'required',
          'phn_code' => 'required',
          'relation' => 'required',
          'beep_activator' => 'required',
          'opt' => 'required',
        ]);

        $family->name = $request->name;
        $family->email = $request->email;
        $family->number = $request->number;
        $family->phn_code = $request->phn_code;
        $family->relation = $request->relation;
        $family->beep_activator = $request->beep_activator;
        $family->opt = $request->opt;
        $family->created_at = now();
        $family->updated_at = now();

        if($family->save()){
            return Response::json(['message' => 'Successfully updated'], 200);
        }else{
            return Response::json(['message' => $family->errors()], 400);
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
        $family = Family::find($id);
        if($family->delete())
        {
          return Response::json(['message' => 'Successfully Deleted'], 200);
        }else{
          return Response::json(['message' => $family->errors()], 400);
        }
    }
}
