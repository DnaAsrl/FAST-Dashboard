<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuctionController extends Controller
{
    public function index(){
        $data = DB::table('more_auction_calendar')->paginate(15);
        return view('auction_list',compact('data'));
    }

}
