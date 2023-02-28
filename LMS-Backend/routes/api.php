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

Route::group(['middleware'=>['auth:sanctum']],function(){
    //  Route::post('/userLMS/',[UserController::class,'addUser']);
});



//register
Route::post('/userLMS/',[UserController::class,'addUser']);
//login
Route::post('/userLMS/login',[UserController::class,'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    // logout route api code here
    Route::post('/userLMS/logout',[UserController::class,'logout']);
    });
//get all users
Route::get('/userLMS/',[UserController::class,'getUser']);
//get user by id
Route::get('/userLMS/{id}',[UserController::class,'getUserbyID']);
//update user
Route::put('/userLMS/{id}',[UserController::class,'updateUser']);
//delete user
Route::delete('/userLMS/{id}',[UserController::class,'deleteUser']);
//search by name
Route::get('/userLMS/getUserbyName/{firstName}',[UserController::class,'getbyName']);
//get teachers
Route::get('/userLMSTeacher',[UserController::class,'getTeacher']);
//get students
Route::get('/userLMSStudent',[UserController::class,'getStudent']);