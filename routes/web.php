<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestMiddleware;
use App\Http\Middleware\OnylMemberMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home']);

Route::get('/template',function() {
    return view('template');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/login','login')->middleware(OnlyGuestMiddleware::class);
    Route::post('/login','doLogin')->middleware(OnlyGuestMiddleware::class);
    Route::post('/logout','doLogout')->middleware(OnylMemberMiddleware::class); //yg boleh logout,cuma member 
});

Route::controller(TodolistController::class)
    ->middleware([OnylMemberMiddleware::class]) // menggunakan middleware yang sama, karena hanya member yang boleh
    ->group(function () {
        Route::get('/todolist','todo');
        Route::post('/todolist','addTodo');
        Route::delete('/todolist/{id}/delete','removeTodo');
    });