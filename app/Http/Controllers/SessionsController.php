<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){

        return view('sessions.create');
    }

    public function store(){

        $attributes = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'You are logged in!');
        }
        return back()
            ->withInput()
            ->withErrors(['email' => 'Given credentials are not valid!']);
    }
    
    public function destroy(){

        auth()->logout();

        return redirect('/')->with('success', 'You are logged out!');
    }
}
