<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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

    Route::controller(ClientController::class)->group(function () {
        Route::get('client', 'index')->name('client');
        Route::post('client/store', 'store')->name('client.store');
        Route::delete('client/destroy/{id}', 'destroy')->name('client.destroy');
        Route::put('client/update/{id}', 'update')->name('client.update');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logoutAction')->middleware('auth')->name('logout');
});
