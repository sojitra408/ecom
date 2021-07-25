<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            // return response(null, 401);
            return ['message' => 'Wrong Username or Password.'];
        } 

        // return response()->json(compact('token'));
        // return response()->json(['token'=> $token]);
        return ['token' => $token];
    }
}
