<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function Index(Request $request){
    	return view('main/index');
    }
}
