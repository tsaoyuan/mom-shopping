<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('momShopping');
});


Route::get('/hello', function () {
    return view('fontpage.cdn');
});