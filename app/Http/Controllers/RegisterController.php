<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create', ['page_title'=>'Register']);
    }
    public function store(StoreRegister $request){
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = $image->storeAs('profile_image', 'user_profile_'.md5(now()).'.'.$image->guessClientExtension());
        }
        $user =  User::create($validated);
        if($user && $request->hasFile('image')){
            $user->image()->save(Image::make(['file'=>$file_name]));
        }
        // To do
        //send mail to confirm registration
        if($user){
            auth()->login($user); //temporary must delete. must force to login 
            return redirect()->route('register.create')->with('status', 'Success');
        }else{
            return redirect()->route('register.create')->with('error', 'Failed');
        }
        
    }
}
