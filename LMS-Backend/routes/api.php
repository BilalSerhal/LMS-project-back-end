<?php
use App\Http\Controllers\SectionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CourseController;
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
//Public Routes
//Sections route
Route::resource('sections', SectionController::class);
//Level route
Route::resource('levels', LevelController::class);


Route::get('/listStudent/{levelName}/{sectionName}', [SectionController::class,'showListStudent']);


Route::post('/course', [CourseController::class,'store']);
Route::get('/course', [CourseController::class,'index']);
Route::put('/course/{id}', [CourseController::class,'update']);
Route::delete('/course/{id}', [CourseController::class,'destroy']);




 

Route::group(['middleware'=>['auth:sanctum']],function(){
    //register
       Route::post('/userLMS/',[UserController::class,'addUser']);
      //update user
      Route::put('/userLMS/{id}',[UserController::class,'updateUser']);
      //delete user
      Route::delete('/userLMS/{id}',[UserController::class,'deleteUser']);
      // logout route api code here
      Route::post('/userLMS/logout',[UserController::class,'logout']);
    });
    

    
    
    //register
  //  Route::post('/userLMS/',[UserController::class,'addUser']);

//login
Route::post('/userLMS/login',[UserController::class,'login']);
//get all users
Route::get('/userLMS/',[UserController::class,'getUser']);
//get user by id
Route::get('/userLMS/{id}',[UserController::class,'getUserbyID']);
//search by name
Route::get('/userLMS/getUserbyName/{firstName}',[UserController::class,'getbyName']);
//get teachers
Route::get('/userLMSTeacher',[UserController::class,'getTeacher']);
//get students
Route::get('/userLMSStudent',[UserController::class,'getStudent']);

/************************ */

