<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Helpers\SystemResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Member\RegisterResource;
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
            return SystemResponse::errorResponse($validator->errors()); 
        }

        // 驗證成功，獲取已驗證的值 (name, password, mobile)
        $validated = $validator->validated();
        $mobile = $validated['mobile'];

        // 判斷 mobile 是否已經被註冊過
        $member = Member::where('mobile', $mobile)->first();
        
        if ($member) {
            // 手機已經被註冊過
            return SystemResponse::basicResponse('手機已存在', 409);
        }

        // 會員註冊成功
        $member = Member::create(
            array_merge(
                $validated, ['password' => Hash::make($validated['password'])]
            )
        );

        return (SystemResponse::dataResponse(RegisterResource::make($member), '會員註冊成功', 201));

    }
}
