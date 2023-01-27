<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\all_announcements;

class AnnouncementController extends Controller
{
    public function index(){
        $announcements = all_announcements::orderBy('news_id','desc')->paginate(15);
    	return view('all_announcements',compact('announcements'));
    }
}
