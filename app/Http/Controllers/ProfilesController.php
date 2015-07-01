<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Input;
use App\Pais;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfilesController extends Controller
{
    public  function choosePhoto(){
        return view('profile.choose_photo');
    }
    public  function savePhoto(Request $request)
    {

        if ($request->file('image')->isValid()){

            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;

            $request->file('image')->move("uploads/", $fileName);
        }
        $input = $request->all();
        $input["image"] = "/uploads/".$fileName;
        $usuario = Auth::user();
        $usuario->image = "/uploads/".$fileName;;
        $usuario->pais= Input::get('pais');
        $usuario->save();
        /*$Bolivia= new Pais;
           $chile=new Pais;
           $argentina=new Pais;
           $Bolivia->name= "Bolivia";
           $chile->name="Chile";
           $argentina->name="Argentina";
           $Bolivia->save();
           $chile->save();
           $argentina->save();*/
        return redirect('index');
    }
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

    public function userSearch(){
        $q = Input::get('user');
        $users = User::name($q)->get();
        return view('profile.searchUser',compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit', compact('user'));
    }
}