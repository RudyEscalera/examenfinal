<?php

namespace App\Http\Controllers;

use App\User;
use App\post;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfilesController extends Controller
{
    public function showProfile($name)
    {
        $user = User::where('name',$name)->first();
        $posts = $user->posts;
        return view('profile.profile', compact('posts','user'));
    }

    public function showIndex()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }


}