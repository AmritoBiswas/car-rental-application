<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\TokenAuthenticate;
use App\Models\Car;
use App\Models\User;
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
Route::get('/userLogin',[UserController::class,'LoginPage'])->name('login');
Route::get('/register',[UserController::class,'Register'])->name('register');



//API Controller Route for user
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/user-logout',[UserController::class,'UserLogout'])->name('logout');

//API Controller Route for Car
Route::post('/create-car',[CarController::class,'create'])->middleware([IsAdmin::class]);
Route::get('/all-car',[CarController::class,'index'])->middleware([IsAdmin::class]);
Route::post('/car-by-id',[CarController::class,'carById'])->middleware([IsAdmin::class]);
Route::post('/update-car',[CarController::class,'update'])->middleware([IsAdmin::class]);
Route::post('/delete-car',[CarController::class,'destroy'])->middleware([IsAdmin::class]);



//Car list Page
Route::get('/carListAdmin',[CarController::class,'carListAdmin'])->middleware([IsAdmin::class]);
Route::get('/carUpdateForm',[CarController::class,'carUpdateAdmin'])->middleware([IsAdmin::class]);

//Customer Page ADmin
Route::get('/customerAdminPage',[CustomerController::class,'customerAdminPage'])->middleware([IsAdmin::class]);
Route::get('/customerUpdate',[CustomerController::class,'customerUpdatePage'])->middleware([IsAdmin::class]);

//API controller route for customer management
Route::get('/all-customer',[CustomerController::class,'index'])->middleware([IsAdmin::class]);
Route::post('/create-customer',[CustomerController::class,'create'])->middleware([IsAdmin::class]);
Route::post('/delete-customer',[CustomerController::class,'destroy'])->middleware([IsAdmin::class]);
Route::post('/customer-by-id',[CustomerController::class,'show'])->middleware([IsAdmin::class]);
Route::post('/customer-update',[CustomerController::class,'update'])->middleware([IsAdmin::class]);

//API controller route for frontend for carcontroller
Route::get('/car-list',[FrontendCarController::class,'allCar'])->name('allCar');
Route::post('/car-list-type',[FrontendCarController::class,'listCarByType']);
Route::post('/car-list-brand',[FrontendCarController::class,'listCarByBrand']);
Route::post('/car-list-rent',[FrontendCarController::class,'listCarByRent']);

//API Controller for rental
Route::get('/rentform/{car_id}',[RentalController::class,'create'])->name('car.rentCreateForm')->middleware([TokenAuthenticate::class]);
Route::post('/createrent/{car}',[RentalController::class,'createRent'])->name('car.createRent')->middleware([TokenAuthenticate::class]);

Route::get('/booked',[RentalController::class,'bookedList'])->name('booked')->middleware([TokenAuthenticate::class]);



//API rentcontroller for Admin
Route::get('/editRentStatus', [AdminRentalController::class, 'editRentStatus'])->middleware([IsAdmin::class]);

Route::put('/updateRentStatus/{id}', [AdminRentalController::class, 'updateRentStatus'])->name('updatestatus')->middleware([IsAdmin::class]);


// Route::get('/',[PageController::class,'homePage']);
Route::get('/', function () {
    $cars = Car::take(6)->where('availability', '=', true)->get();
    return view('pages.home', compact('cars'));
})->name('home');


Route::get('/dashboard',[AdminRentalController::class,'dashBoard'])->middleware([IsAdmin::class]);

Route::get('/allRent',[AdminRentalController::class,'rentPage'])->middleware([IsAdmin::class]);




