<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\main;
use App\Models\room;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    
    public function index(){
        $data =main::all();
        return view('home',compact('data'));
    }

    public function viewgallery(){
        $room=room::all();
        $data=gallery::all();
        return view('gallery',compact('room','data'));
    }
}
