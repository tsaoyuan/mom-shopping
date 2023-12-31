<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\AuthController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\SearchController;

Route::get('/hello',function(){
    return 'hey yo! Mom happy shopping.';
});

// 首頁-登入的畫面
Route::get('/', fn() => view('auth.login'));

// f01 註冊
// 1. 用手機查詢會員基本資訊
// /v1/members/get-status
// Backend-API
Route::get('/members/get-status', [SearchController::class,'getStatus']);

// Fontend
Route::get('/status', function(){
    
    return view('members.status');
});

Route::prefix('members')->group(function(){
    // 註冊
    Route::post('/', [MemberController::class, 'register']);
    // 登入
    Route::post('/login', [AuthController::class, 'login']);
});


// 登出
Route::middleware(['auth:member'])->group(function () {
    Route::post('/members/logout', [AuthController::class, 'logout']);
});

