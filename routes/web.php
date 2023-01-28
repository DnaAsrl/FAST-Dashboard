<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('auth.login');
// });




Route::get('/dashboard',[ReportController::class,'chartGen'])->middleware(['auth'])->name('dashboard');
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('logout', [AuthController::class, 'signOut'])->name('logout');

// announcement
Route::get('/announcement',[AnnouncementController::class,'index'])->middleware(['auth']);

// facility information
Route::get('/facilityInformation',[FacilityController::class,'index'])->middleware(['auth']);

// stock information
Route::get('/stockInformation',[StockController::class,'index'])->middleware(['auth']);

// more auction calendar
Route::get('/auctionList',[AuctionController::class,'index'])->middleware(['auth']);