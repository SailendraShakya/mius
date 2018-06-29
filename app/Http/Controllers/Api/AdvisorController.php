<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;
use App\Advisor;
use Response;
use Illuminate\Support\Facades\Storage;

class AdvisorController extends Controller
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
            $advisors = $user->advisors;
            return Response::json(['status'=>'sucess','data'=>$advisors], 200);
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
              'is_lawyer' => 'required',
              'is_insurance_agent' => 'required',
              'is_financial_advisor' => 'required',
            ]);

            $advisor = $user->advisors()->create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'is_lawyer' => $request->is_lawyer,
            'is_insurance_agent' => $request->is_insurance_agent,
            'is_financial_advisor' => $request->is_financial_advisor,
            'created_at' => now(),
            'updated_at' => now()
            ]);
            return Response::json(['status'=>'sucess','data'=>$advisor], 200);

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
        $guardian = Advisor::find($id);
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
        $advisor = Advisor::find($id);
        if(!$advisor){
          return Response::json(['message' => 'No user with given id'], 400);
        }
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'number' => 'required',
          'is_lawyer' => 'required',
          'is_insurance_agent' => 'required',
          'is_financial_advisor' => 'required',
        ]);

        $advisor->name = $request->name;
        $advisor->email = $request->email;
        $advisor->number = $request->number;
        $advisor->is_lawyer = $request->is_lawyer;
        $advisor->is_insurance_agent = $request->is_insurance_agent;
        $advisor->is_financial_advisor = $request->is_financial_advisor;
        $advisor->created_at = now();
        $advisor->updated_at = now();

        if($advisor->save()){
            return Response::json(['message' => 'Successfully updated'], 200);
        }else{
            return Response::json(['message' => $advisor->errors()], 400);
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
        $advisor = Advisor::find($id);
        if(!$advisor){
          return Response::json(['message' => 'No user with given id'], 400);
        }
        if($advisor->delete())
        {
          return Response::json(['message' => 'Successfully Deleted'], 200);
        }else{
          return Response::json(['message' => $advisor->errors()], 400);
        }
    }
}
