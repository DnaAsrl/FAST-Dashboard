<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::post('get-customer',[Admin::class,'getCustomer']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/stock-information', function(){

    return DB::table('stock_information')->get();

});

Route::get('/stock-information/{created_at}', function($created_at){

    return DB::table('stock_information')->whereraw('date(created_at)  >= "' . $created_at . '"')->get();

});


Route::get('/facility-information', function(){

    return DB::table('facility_information')->get();

});

Route::get('/facility-information/{created_at}', function($created_at){

    return DB::table('facility_information')->whereraw('date(created_at)  >= "' . $created_at . '"')->get();

});

Route::get('/auction-calendar', function(){

    return DB::table('more_auction_calendar')->get();

});

Route::get('/auction-calendar/{created_at}', function($created_at){

    return DB::table('more_auction_calendar')->whereraw('date(created_at)  >= "' . $created_at . '"')->get();

});

Route::get('/announcements', function(){

    return DB::table('all_announcements')->get();

});

Route::get('/announcements/{embargo_date}', function($embargo_date){

    return DB::table('all_announcements')->whereraw('date(embargo_date)  >= "' . $embargo_date . '"')->get();

});

// Route::get('/maturity_date', function(){

//     return DB::table('maturitydateview')->get();

// });

Route::post('/stock/{maturity_date}', [StockController::class,'index']);

Route::post('/facility/{maturity_date}', [FacilityController::class,'index']);
