<?php

namespace App\Http\Controllers;



class WebDevHackathonController extends Controller
{
    
    public function index() {
        $quotes = include(app_path()."/Data/metaverse_quotes.php");

        return response()->json($quotes);
    }
}
