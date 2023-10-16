<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\AuthController;
use App\Http\Controllers\Member\RegisterController;
use App\Http\Controllers\Member\SearchController;

Route::get('/hello',function(){
    return 'hey yo! Mom happy shopping.';
});

// f01 註冊
// 1. 查詢會員簡訊驗證狀態
// /v1/members/get-status
// Backend-API
Route::get('/members/get-status', [SearchController::class,'getStatus']);
// Fontend
Route::get('/status', function(){
    
    return view('members.status');
});
// f01 註冊
// 1. 查詢會員簡訊驗證狀態
// /v1/members/get-status
Route::get('/members/get-status', [SearchController::class,'getStatus']);

Route::get('/members/status', function(){
    
    return view('members.status');
});

// 2. 發送驗證簡訊
// /v1/auth/sms/send
Route::post('/auth/sms/send', function(){});

// 3. 驗證簡訊 (簡訊驗證碼頁面) 若驗證成功，取得 token
// 取得的 token 當下，要把這隻手機號碼新增在的會員表的 XXX 欄位嗎？做成欄位嗎?
// /v1​/auth​/sms​/verify
Route::post('/auth/sms/verify', function(){});

// 4-1 會員不存在 > 註冊、新增會員資料 (非登入狀態, 須傳入token)
// /v1/members
// 這個 token 哪個步驟取得的？ 步驟 3 取得 token
// 用什麼方式帶入 token? 
Route::post('/members', function(){});

// 4-2 會員存在-未驗證 > 查詢會員基本資料(用手機號碼作為查詢依據 phone = 0900333000, 須傳入token)
// /v1/members/basic
// 這個 token 哪個步驟取得的？ 步驟 3 取得 token
// 用什麼方式帶入 token? 
Route::get('/members/basic', function(){});

// 5 會員-未驗證，修改會員資料(系統帶出既有資料，非登入狀態)
// /v1/members/{id}
Route::patch('/members/{id}', function(){});


// f02 登入
// test register, login for jwt
Route::post('/members/login', [AuthController::class, 'login']);
Route::post('/members/register', [RegisterController::class, 'register']);

// f03 忘記密碼
// 1. 查詢會員簡訊驗證狀態 
// /v1/members/get-status (與 f01 重複)
// Route::get('/members/get-status', function(){});

// 2. 發送驗證簡訊
// /v1/auth/sms/send (與 f01 重複)
// Route::post('/auth/sms/send', function(){});

// 3. 驗證簡訊 (簡訊驗證碼頁面) 若驗證成功，取得 token
// 取得的 token 當下，要把這隻手機號碼新增在的會員表的 XXX 欄位嗎？做成欄位嗎?
// /v1​/auth​/sms​/verify (與 f01 重複)
// Route::post('/auth/sms/verify', function(){});

// 4. 會員-已驗證，進入 routes/v2.php 重設密碼

// 5. 會員-未驗証，修改會員資料(系統帶出既有資料，非登入狀態)
// /v1/members/{id} (與 f01 重複)
// Route::patch('/members/{id}', function(){});


// f04 修改密碼(登入狀態)
// 修改密碼
// /v1/members/{id}/change-password
Route::middleware('auth:member')->group(function () {
    Route::get('/auth-jwt', function(){
        dd('auth jwt');
    });

    Route::post('/members/{id}/change-password', function(){
        return '修改密碼';
    });
});

// 登出
Route::middleware(['auth:member'])->group(function () {
    Route::post('/members/logout', [AuthController::class, 'logout']);
});

