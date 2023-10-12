<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Helpers\SystemResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Member\StatusResource;

class SearchController extends Controller
{
    public function getStatus(Request $request){

        // Query parameters
        $validator = Validator::make($request->all(), [
            // The mobile number. Example: 0923456789
            'mobile' => ['required', 'string', 'size:10', 'regex:/^[0-9]+$/'],
        ]);

        if($validator->fails()){
            return SystemResponse::errorResponse($validator->errors()); 
        }

        $mobile = $request->input('mobile');
        $member = Member::where('mobile', $mobile)->first();
        
        // 會員不存在 (NOT_EXIST)
        if (!$member) {
            return SystemResponse::dataResponse(['status' => 'NOT_EXIST']);
        } 

        // 手機格式正確, 會員存在, 顯示會員資料
        return SystemResponse::dataResponse( StatusResource::make($member));
    }
}
