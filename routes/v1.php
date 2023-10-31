<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\AuthController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\SearchController;

Route::get('/hello',function(){
    return 'hey yo! Mom happy shopping.';
});

// f01 註冊
// 1. 用手機查詢會員基本資訊
// /v1/members/get-status
// Backend-API
Route::get('/members/get-status', [SearchController::class,'getStatus']);

// Fontend
Route::get('/status', function(){
    
    return view('members.status');
});

// 2. 註冊
Route::post('/members', [MemberController::class, 'register']);

// f02 登入
Route::post('/members/login', [AuthController::class, 'login']);

// 登出
Route::middleware(['auth:member'])->group(function () {
    Route::post('/members/logout', [AuthController::class, 'logout']);
});

