<?php

namespace App\Http\Controllers\dashboard\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHomePage(){
        return view('dashboard.home');
    }
}
