<?php

namespace GolpeAvisa\Http\Controllers;

use Illuminate\Http\Request;
use GolpeAvisa\Location;
class MapController extends Controller
{
    public function index (){       
        $location=Location::all();
        //return response()->json(['location'=>$location]);
        return view('layout',['locations'=>$location]);
    }
}
