<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StockController extends Controller
{
    public function index(){
        $stocks = DB::table('stock_information')->orderBy('stock_code','desc')->paginate(15);
    	return view('stock_information',compact('stocks'));
    }
}
