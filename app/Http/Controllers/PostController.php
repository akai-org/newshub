<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function home() {
        $posts = Post::all();
        dd($posts);
        return view('posts', ['posts' => $posts]);
    }

    public function user() {
        return view('user');
    }
}
