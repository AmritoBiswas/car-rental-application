<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\TokenAuthenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Page Controller Route
Route::get('/userLogin',[UserController::class,'LoginPage']);

//API Controller Route for user
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/user-logout',[UserController::class,'UserLogout']);

//API Controller Route for Car
Route::post('/create-car',[CarController::class,'create'])->middleware([IsAdmin::class]);
Route::get('/all-car',[CarController::class,'index'])->middleware([IsAdmin::class]);
Route::post('/car-by-id',[CarController::class,'carById'])->middleware([IsAdmin::class]);
Route::post('/update-car',[CarController::class,'update'])->middleware([IsAdmin::class]);
Route::post('/delete-car',[CarController::class,'destroy'])->middleware([IsAdmin::class]);