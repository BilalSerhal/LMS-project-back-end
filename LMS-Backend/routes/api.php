<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;

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
Route::post('/attendance/createAttendance',[AttendanceController::class,'createAttendance']);
Route::post('/attendance/getAttendanceReport',[AttendanceController::class,'getAttendancereport']);

