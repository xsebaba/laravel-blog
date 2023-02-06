<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user){

        return view('profile.show', compact('user'));
    }

    public function edit(User $user){

        return view('profile.edit-avatar', compact('user'));
    }

    public function update(User $user){

        $attributes  = request()->validate([
            'avatar' =>'required|image|max:2048',
        ]);
       
        if (isset($attributes['avatar'])) {
            $attributes['avatar'] = request()->file('avatar')->store('avatars');
            }
            
            $user->update($attributes);
    
            return back()->with('success', 'Avatar updated');
    }
}
