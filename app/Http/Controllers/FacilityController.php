<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facility_information;
use Illuminate\Support\Facades\DB;


class FacilityController extends Controller
{
    public function index(){
        $facilities = DB::table('facility_information')->orderBy('facility_code','desc')->paginate(15);
    	return view('facility_information',compact('facilities'));
    }

    public function maturity(Request $request){

        $date = $request->get('date');
        
        $facilities = DB::table('facility_information')->whereRaw("maturity_date like '".$date."'");

        foreach ($facilities->get() as $facility){
            try {
                DB::table('facility_matured')->insert(
                    array(
                        'facility_code' => $facility->facility_code,
                        'principle' => $facility->principle,
                        'instrument_id' => $facility->instrument_id,
                        'maturity_date' => $facility->maturity_date,
                    )
                );
            }
            catch (\Exception $e){
                continue;
            }

        }

        $facility_codes = $facilities->select('facility_code')->get();

        return $facility_codes;
    }
    
}
