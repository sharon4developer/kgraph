<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $response=[
                'status'=>true,
                'message'=>'Successfully logged in...',
                'return_url'=>'/admin/dashboard',
            ];
        }
        else{
            $response=[
                'status'=>false,
                'message'=>'These credentials do not match our records.',
            ];
        }
        return response()->json($response);
    }

}
