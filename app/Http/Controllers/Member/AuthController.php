<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Helpers\SystemResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Member\LoginResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * @group Member management / 會員管理
 * 
 * APIs for managing members
 */
class AuthController extends Controller
{
    /** 
     * member login / 會員登入
     * @unauthenticated
     * 
     * @responseFile status=200 responses/Member/login.success.json
     * @responseFile status=400 responses/Member/login.parameterError.json
     * @responseFile status=400 responses/Member/login.passwordError.json
     * @responseFile status=404 responses/Member/login.notExist.json
     */
    public function login(Request $request)
    {
        // Body parameters
        $validator = Validator::make(
            $request->all(),
            [
                // 電話 Example:0900000000
                'mobile'   => ['required', 'string', 'size:10', 'regex:/^[0-9]+$/'],
                'password' => ['required', 'string', 'min:4', 'max:8'],
            ]
        );

        // 參數格式錯誤回應
        if ($validator->fails()) {
            return SystemResponse::errorResponse($validator->errors());
        }

        // 用 mobile 查詢會員存在(顯示會員資料) or 不存在(null)
        $member = Member::where('mobile', $request->input('mobile'))->first();

        // 會員不存在
        if (!$member) {
            return SystemResponse::basicResponse('會員不存在', 404);
        }

        // 驗證成功，獲取已驗證的值 ($validator->validated())
        $validated = $validator->validated();
        $token = Auth::attempt($validated);

        // 帳號密碼錯誤 
        if (!$token) {
            return SystemResponse::basicResponse('密碼錯誤', 400);
        } else {
            // 登入成功    
            $member['token'] = $token;
            return SystemResponse::dataResponse(LoginResource::make($member), '登入成功');
        }
    }

    public function logout()
    {
        // 清除使用者的認證狀態(JWT 工具產生的 token)
        Auth::logout();
        return response()->noContent();
    }
}
