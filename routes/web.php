<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index')->name('product');
        Route::post('product/store', 'store')->name('product.store');
        Route::delete('product/destroy/{id}', 'destroy')->name('product.destroy');
        Route::put('product/update/{id}', 'update')->name('product.update');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logoutAction')->middleware('auth')->name('logout');
});
