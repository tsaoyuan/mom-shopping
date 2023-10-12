<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Members\Search\BadRequestResource;

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

    }
}
