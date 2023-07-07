<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\AuthController;
use App\Http\Controllers\Member\RegisterController;

Route::get('/hello',function(){
    return 'hey yo! Mom happy shopping.';
});

// test register, login for jwt
Route::post('/members/login', [AuthController::class, 'login']);
Route::post('/members/register', [RegisterController::class, 'register']);
Route::middleware('auth:member')->group(function () {
    Route::get('/auth-jwt', function(){
        dd('auth jwt');
    });

});
