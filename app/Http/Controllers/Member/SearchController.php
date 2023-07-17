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

        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'string', 'size:10', 'regex:/^[0-9]+$/'],
        ]);

        if($validator->fails()){
            // dd(111);
            return BadRequestResource::make($validator->errors());
        }

    }
}
