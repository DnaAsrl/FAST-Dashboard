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

    public function maturity(Request $request){

        $date = $request->get('date');
        
        $stocks = DB::table('stock_information')->whereRaw("maturity_date like '".$date."'");

        foreach ($stocks->get() as $stock){
            try {
                DB::table('stock_matured')->insert(
                    array(
                        'stock_code' => $stock->stock_code,
                        'facility_code' => $stock->facility_code,
                        'instrument_id' => $stock->instrument_id,
                        'issue_date' => $stock->issue_date,
                        'maturity_date' => $stock->maturity_date,
                    )
                );
            }
            catch (\Exception $e){
                continue;
            }

        }

        $stock_codes = $stocks->select('stock_code')->get();

        return $stock_codes;
    }
}
