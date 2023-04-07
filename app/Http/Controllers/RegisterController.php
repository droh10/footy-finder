<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegister;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create', ['page_title'=>'Register']);
    }
    public function store(StoreRegister $request){

    }
}
