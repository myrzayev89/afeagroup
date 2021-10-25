<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginStore'])->name('loginStore');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'store'])->name('register.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
    Route::resource('category', \App\Http\Controllers\CategoryController::class)->parameter('category', 'id');
    Route::resource('post', \App\Http\Controllers\PostController::class)->parameter('post', 'id');
    Route::resource('tag', \App\Http\Controllers\TagController::class)->parameter('tag', 'id');
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
