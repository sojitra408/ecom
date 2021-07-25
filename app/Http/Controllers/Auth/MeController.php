<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        // var_dump($request->user());
        // dd($request->user());
        // return ['user' => $request->user()];

        $user = $request->user();
        
        return response()->json([
            'email' => $user->email,
            'name' => $user->name
        ]);
    }
}
