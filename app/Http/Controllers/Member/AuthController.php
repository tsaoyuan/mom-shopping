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
            'mobile' => ['required'], 
            // 'email' => ['required'],
            // 'name' => ['required'],
            'password' => ['required'],
        ]);
        // dd($validated);

        $token = Auth::attempt($validated);
        $user = Auth::user();
        // dd($user);
        return response([
            'token' => $token,
            'data'  => $user
        ]);
        // return '會員登入';
    }

    public function logout(){
        // 清除使用者的認證狀態(JWT 工具產生的 token)
        Auth::logout();
        return response()->noContent();
    }
}
