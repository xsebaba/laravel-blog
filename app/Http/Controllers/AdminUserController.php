<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class AdminUserController extends Controller
{

    public function index(){
        return view('admin.posts.index-users', [
            'users' => User::paginate(50)
        ]);
    }

    public function ban(){
    
    $user = User::where('username', request()->username)->firstOrFail();
    $now = Carbon::now();
    $user->blocked_at = $now;
    $user->save();

    return back()->with('success', 'User is blocked');
    }
}
