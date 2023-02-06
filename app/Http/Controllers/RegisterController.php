<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){

        return view('register.create'); 
    }
    public function store(){
        $attributes = request()->validate([
            'name' => 'required|min:2|max:255',
            'username' => 'required|min:4|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);
        $attributes['avatar'] = "avatars/lary-avatar.png";
        $user=User::create($attributes);
        auth()->login($user);

        session()->flash('success', 'Your account has been created !');
        return redirect('/'); 
    }
}
