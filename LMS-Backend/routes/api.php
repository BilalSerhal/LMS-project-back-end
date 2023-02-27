<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/userLMS/',[UserController::class,'addUser']);
Route::get('/userLMS/',[UserController::class,'getUser']);
Route::get('/userLMS/{id}',[UserController::class,'getUserbyID']);
Route::put('/userLMS/{id}',[UserController::class,'updateUser']);
Route::delete('/userLMS/{id}',[UserController::class,'deleteUser']);
Route::get('/userLMS/getUserbyName/{firstName}',[UserController::class,'getbyName']);
Route::get('/userLMSTeacher',[UserController::class,'getTeacher']);
Route::get('/userLMSStudent',[UserController::class,'getStudent']);