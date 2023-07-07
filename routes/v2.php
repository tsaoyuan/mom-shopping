<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// f03 重設密碼
// 重設密碼
// /v2/members/reset-password
// (傳入sms/verify 取到的token)
Route::post('/members/reset-password',function(){
    return '重設密碼';
});
