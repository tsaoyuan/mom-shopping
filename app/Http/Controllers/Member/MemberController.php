<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function register(Request $request){
        $validated = $this->validate($request, [
            'name' => ['required'], 
            'password' => ['required', 'alpha_num:ascii', 'min:6','max:12'],
            'mobile' => ['required', 'string', 'size:10', 'regex:/^[0-9]+$/'],
        ]);

        $member = Member::create(
            array_merge(
                $validated, ['password' => Hash::make($validated['password'])]
            )
        );

        // return $validated;
        return $member;

    }
}
