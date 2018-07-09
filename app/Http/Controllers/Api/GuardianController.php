<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;
use App\Guardian;
use Response;
use Illuminate\Support\Facades\Storage;

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
            return Response::json(['status'=>'success','data'=>$guardians], 200);
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
              'phone' => 'required',
              'photo' => 'required',
              'status' => 'required',
              'relationship' => 'required',
            ]);

            // Handle File Upload
            if($request->hasFile('photo')){
                $filenameWithExt = $request->file('photo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                $path = $request->file('photo')->storeAs('public/guardian_images', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.jpg';
            }

            $filename = $request->file('photo')->getClientOriginalName();
            $guardian = $user->guardians()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'photo' => 'public/guardian_images/'.$fileNameToStore,
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
        if(!$guardian){
          return Response::json(['message' => 'No user with given id'], 400);
        }
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'photo' => 'required',
          'status' => 'required',
          'relationship' => 'required',
        ]);

        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $exists = Storage::disk('local')->exists($guardian->photo);
            $path = $request->file('photo')->storeAs('public/guardian_images', $fileNameToStore);
            if($exists){
              Storage::disk('local')->delete($guardian->photo);
            }
        }

        $guardian->name = $request->name;
        $guardian->email = $request->email;
        $guardian->phone = $request->phone;

        if($request->hasFile('photo')){
          $guardian->photo = 'public/guardian_images/'.$fileNameToStore;
        }
        $guardian->status = $request->status;
        $guardian->relationship = $request->relationship;
        $guardian->created_at = now();
        $guardian->updated_at = now();

        if($guardian->save()){
            return Response::json(['message' => 'Successfully updated'], 200);
        }else{
            return Response::json(['message' => $guardian->errors()], 400);
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
        $guardian = Guardian::find($id);
        if(!$guardian){
          return Response::json(['message' => 'No user with given id'], 400);
        }
        if($guardian->cover_image != 'noimage.jpg')
        {
          Storage::disk('local')->delete($guardian->photo);
        }

        if($guardian->delete())
        {
          return Response::json(['message' => 'Successfully Deleted'], 200);
        }else{
          return Response::json(['message' => $guardian->errors()], 400);
        }
    }
}
