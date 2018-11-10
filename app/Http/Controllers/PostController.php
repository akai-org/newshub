<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function home() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function user($username) {
        $user = User::where('username', $username)->get()->first();
        $posts = $user->posts;
        return view('user', ['user' => $user, 'posts' => $posts]);
    }

    public function create() {
        return view('create');
    }

    public function new_post() {
        return request()->all();
    }
}
