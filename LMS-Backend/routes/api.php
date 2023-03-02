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



//User route
Route::post('/userLMS/',[UserController::class,'addUser']);
Route::get('/userLMS/',[UserController::class,'getUser']);

Route::get('/listStudent/{levelName}/{sectionName}', [SectionController::class,'showListStudent']);


Route::post('/course', [CourseController::class,'store']);
Route::get('/course', [CourseController::class,'index']);
Route::put('/course/{id}', [CourseController::class,'update']);
Route::delete('/course/{id}', [CourseController::class,'destroy']);
// Route::post('/register', [UserController::class, 'register']);
// Route::post('/login', [UserController::class, 'login']);
// Route::post('/logout', [UserController::class, 'logout']);
// Route::group(['middleware' => ['jwt.user']], function() {
//     Route::post('/logout', ['App\Http\Controllers\UserController', 'logout']);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request){

    return $request->user();
});


Route::get('/hello', function () {
    return view('welcome');
});

