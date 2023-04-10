<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function view(){
        echo "dashboard";
        //return view('dashboard.view', ['page_title'=>'Dashboard']);
    }
}
