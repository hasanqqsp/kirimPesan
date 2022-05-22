<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReplyController;
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
Route::get('/login',fn() => view('login'));

Route::get('/signup',fn() => view('signup'));

Route::get('/receive',fn() => view('receive'));
Route::get('/sender',fn() => view('sender'));
Route::patch('/dashboard/{id}/{messageId}/{replyId}/hide',[ReplyController::class,'hide']);
Route::delete('/dashboard/{id}/{messageId}/{replyId}',[ReplyController::class,'destroy']);
Route::get('/dashboard/{id}',[UserController::class,'dashboard']);
Route::get('/dashboard/{id}/{messageId}',[MessageController::class,'dashboardShow']);
Route::delete('/dashboard/{id}/{messageId}',[MessageController::class,'destroy']);
Route::patch('/dashboard/{id}/{messageId}/hide',[MessageController::class,'hide']);
Route::patch('/dashboard/{id}/{messageId}/pin',[MessageController::class,'pin']);



Route::get('/{id}/{messageId}',[MessageController::class,'show']);

Route::get('/{id}',[UserController::class,'show']);

Route::post('{id}/{messageId}',[ReplyController::class,'store']);


Route::post('/{id}',[MessageController::class,'store']);


