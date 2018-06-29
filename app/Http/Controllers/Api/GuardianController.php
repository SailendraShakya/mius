<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;
use App\Guardian;
use Response;

class GuardianController extends Controller
{
    // *
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response

    public function index()
    {
        try {
            $authUser = JWTAuth::parseToken()->authenticate();
            $user = User::find($authUser->id);
            $guardians = $user->guardians;
            return Response::json(['status'=>'sucess','data'=>$guardians], 200);
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
            $this->validate($request, ['email' => 'required|email']);
            $guardian = $user->guardians()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'photo' => $request->photo,
            'status' => $request->status,
            'relationship' => $request->relationship,
            'created_at' => now(),
            'updated_at' => now()
            ]);
            return Response::json(['status'=>'sucess','data'=>$guardian], 200);

        }catch (Exception $e) {
            return Response::json(['status' => 'error'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guardian = App\Guardian::find($id);
        return $guardian;
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
        $guardian = Guardian::find($id);
        $guardian->name = $request->name;
        $guardian->email = $request->email;
        $guardian->phone = $request->phone;
        $guardian->photo = $request->photo;
        $guardian->status = $request->status;
        $guardian->relationship = $request->relationship;
        $guardian->created_at = now();
        $guardian->updated_at = now();

        if($guardian->save()){
            return Response::json(['data' => 'Successfully updated'], 200);
        }else{
            return Response::json(['error' => $guardian->errors()], 400);
        }
        return Response::json(['data' => 'Successfully updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $user = Guardian::destroy($id);
        return $user;
    }
}
