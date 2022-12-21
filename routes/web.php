<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//if user login goto dashboard, other these routes will be hit

Route::group(['middleware' => 'is_not_login'],function(){
    Route::get('/register',[UserController::class,'loadRegister']);
    Route::post('/user-registered',[UserController::class,'registered']);
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/userLogin',[UserController::class,'userLogin']);
    Route::get('/referral-register',[UserController::class,'loadReferralRegister']);
    Route::get('/email-verification/{token}',[UserController::class,'emailVerification']);
});

//if login success
Route::group(['middleware' => 'is_not_logout'],function (){
    Route::get('/dashboard',[UserController::class,'loadDashboard']);
    Route::get('/referral-tracker',[UserController::class,'referralTracker']);
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
});






