<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Notifications\CustomerResetPasswordNotification;

// use Validator;

use App\Transformers\Json;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;



class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getResetToken(Request $request)
    {
        if(!$request->has('email')){
          return response()->json(['success' => false, 'message' => 'Invalid key'], 400);
        }
        try {
          $this->validate($request, ['email' => 'required|email']);
          $user = User::where('email', $request->input('email'))->first();
          if (!$user) {
              return response()->json(Json::response(null, trans('passwords.user')), 400);
          }
          $token = $this->broker()->createToken($user);
          $response = $this->broker()->sendResetLink(
          $request->only('email'), $this->resetNotifier($token)
          );

          switch ($response) {
          case Password::RESET_LINK_SENT:
          return response()->json([
          'success' => true,
          'message' => 'Forgot password link sent to email'
          ]);
          case Password::INVALID_USER:
          default:
          return response()->json([
          'success' => false,
          'message' => 'Invalid user'
          ]);
          }

        } catch (ModelNotFoundException $exception) {
          return response()->json([
          'success' => false,
          'message' => back()->withError($exception->getMessage())->withInput()
        ]);
        }


    }

    protected function resetNotifier($token)
    {
        return new CustomerResetPasswordNotification($token);
    }
}
