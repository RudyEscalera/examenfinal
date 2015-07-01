<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use Input;


class PostsController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post($request->all());

        $post->save();

        return (redirect()->back());
    }
    public function postSearch()
    {
    	$q = Input::get('post');
        $posts = Post::post($q)->get();
        return view('postSearch',compact('posts'));
    }
}
