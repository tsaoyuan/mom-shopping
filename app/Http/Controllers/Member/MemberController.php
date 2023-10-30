<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function register(Request $request){
        
        // 手動建立驗證器 (Validator)
        $validator = Validator::make($request->all(),[
            'name' => ['required'], 
            'password' => ['required', 'alpha_num:ascii', 'min:6','max:12'],
            'mobile' => ['required', 'string', 'size:10', 'regex:/^[0-9]+$/'],
        ]);

        // 驗證器-驗證參數錯誤
        if($validator->fails()){
            dd($validator->errors());
        }

        $member = Member::create(
            array_merge(
                $validated, ['password' => Hash::make($validated['password'])]
            )
        );

        // return $validated;
        return $member;

    }
}
