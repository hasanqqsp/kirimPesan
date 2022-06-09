<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReplyController;
use App\Http\Middleware\OnlyOwnResources;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\KeepAdmin;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/login',fn() => view('login'))->middleware('guest')->name("login");
Route::post('/login',[UserController::class,'authenticate'])->middleware('guest');

Route::get('/signup',fn() => view('signup'))->name("signup")->middleware('guest');
Route::post('/signup',[UserController::class,'store'])->middleware('guest');
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

Route::middleware([Authenticate::class, OnlyOwnResources::class])->group(function () {
    Route::patch('/{id}/settings',[UserController::class,'settings']);
    Route::patch('/{id}/bio',[UserController::class,'bio']);
    Route::patch('/{id}/avatar',[UserController::class,'avatar']);
    Route::delete('/{id}/avatar',[UserController::class,'avatarDelete']);
    Route::patch('/{id}/password',[UserController::class,'password']);
    
    Route::patch('/{id}/{messageId}/{replyId}/hide',[ReplyController::class,'hide']);
    Route::delete('{id}/{messageId}/{replyId}',[ReplyController::class,'destroy']);
    Route::delete('/{id}/{messageId}',[MessageController::class,'destroy']);
    Route::patch('/{id}/{messageId}/hide',[MessageController::class,'hide']);
    Route::patch('/{id}/{messageId}/pin',[MessageController::class,'pin']);
});


Route::get('/{id}/{messageId}',[MessageController::class,'show']);
Route::get('/{id}',[UserController::class,'show']);

Route::post('{id}/{messageId}',[ReplyController::class,'store']);
Route::post('/{id}',[MessageController::class,'store']);


