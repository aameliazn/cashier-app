<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::controller(DataController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth')->name('dashboard');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');    
    Route::post('login', 'loginAction')->name('login.action');
    
    Route::get('logout', 'logoutAction')->middleware('auth')->name('logout');    
});
