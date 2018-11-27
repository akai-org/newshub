<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function user($username) {
        $user = User::where('username', $username)->get()->first();
        return view('user_posts', ['user' => $user]);
    }

    public function create() {
        return view('create');
    }

    public function new_post() {
        return request()->all();
    }
}