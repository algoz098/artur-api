<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GasTrackController extends Controller
{
    public function about(){
        return view('gas-track/about');
    }
}
