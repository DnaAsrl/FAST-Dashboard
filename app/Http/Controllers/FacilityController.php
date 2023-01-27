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

    
}
