<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Response;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function updateGoal(Request $request)
    {
      $authUser = JWTAuth::parseToken()->authenticate();
      $user = User::find($authUser->id);
      if(!$user){
        return Response::json(['title' => 'No user found', 'message' => 'No user with given id'], 400);
      }
      $this->validate($request, [
        'goals' => 'required|numeric',
      ]);
      $detail = $user->detail;
      $detail->goals = $request->goals;
      if($detail->save()){
          return Response::json(['status' => 'success', 'message'=>'Goals successfully updated','data'=>$detail], 200);
      }else{
          return Response::json(['title' => 'Error', 'message'=>'Error while updating goals','data'=>$detail], 200);
      }
    }

    public function uploadImage(Request $request)
    {
        try {
            $authUser = JWTAuth::parseToken()->authenticate();
            $user = User::find($authUser->id);
            if(!$user){
                return Response::json(['title' => 'No user found', 'message' => 'No user with given id'], 400);
            }
            $detail = $user->detail;

            $this->validate($request, [
              'photo' => 'required',
            ]);

            // Handle File Upload
            if($request->hasFile('photo')){
                $filenameWithExt = $request->file('photo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                $path = $request->file('photo')->storeAs('public/profile_images', $fileNameToStore);
                //if not no_image delete
                if($detail->photo){
                    Storage::disk('local')->delete($detail->photo);
                }
            } else {
                $fileNameToStore = 'noimage.jpg';
            }
            $detail->photo = 'public/profile_images/'.$fileNameToStore;
            $detail->created_at = now();
            $detail->save();
            return Response::json(['status' => 'success', 'message'=>'Image successfully uploaded','data'=>$detail], 200);
        } catch (Exception $e) {
            return Response::json(['title' => 'Error', 'message' => 'error while uplaoding image',], 400);
        }
    }

    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
        try {
            JWTAuth::invalidate($request->input('token'));
            return response([
            'status' => 'success',
            'message' => 'You have successfully logged out.'
        ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response([
                'title' => 'Error',
                'message' => 'Failed to logout, please try again.'
            ]);
        }
    }

}
