<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
// announcement
Route::get('/announcement',[AnnouncementController::class,'index']);

// facility information
Route::get('/facilityInformation',[FacilityController::class,'index']);

// stock information
Route::get('/stockInformation',[StockController::class,'index']);

// more auction calendar
Route::get('/auctionList',[AuctionController::class,'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard',[ReportController::class,'chartGen'])->name('dashboard');

});



require __DIR__.'/auth.php';