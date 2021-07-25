<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class SignUpController extends Controller
{
    public function __invoke(Request $request)
    {
        if (User::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'mobile' => ' ', 
            'password' => Hash::make($request->password),
            ])) {
                
            return ['success' => true, 'successMsg' => 'Registration successful. You can Log In now.'];
        }
            
        return ['success' => false, 'failureMsg' => 'Registration unsuccessful.'];
    }
}
