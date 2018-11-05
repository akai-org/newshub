<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function home() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function user() {
        return view('user');
    }

    public function create() {
        return view('create');
    }

    public function new_post() {
        return request()->all();
    }
}
