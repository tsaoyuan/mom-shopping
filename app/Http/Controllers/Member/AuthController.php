<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $validated = $this->validate($request, [
            'phone' => ['required'], 
            // 'email' => ['required'],
            // 'name' => ['required'],
            'password' => ['required'],
        ]);
        // dd($validated);

        $token = Auth::attempt($validated);
        // $user = Auth::user();
        dd($token);
        // dd($user);
        // return response(['data' => $token]);
        // return '會員登入';
    }
}
