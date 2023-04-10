<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserValidate;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function authenticate(StoreUserValidate $request){
        $validated = $request->validated();
        if(auth()->attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else{
            return back()->with('error', 'Invalid email and password combination');
        }
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        redirect()->route('home');
    }
}
