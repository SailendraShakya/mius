<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calm;
use Response;

class CalmController extends Controller
{
    public function index()
    {
        try {
          $calm = Calm::all();
            return Response::json(['status'=>'sucess','data'=>$calm], 200);
        } catch (Exception $e) {
            return Response::json(['title' => 'error', 'message' => 'Failed to fetch calm exercise'], 400);
        }
    }
}
