<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

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
        return view('new_post');
    }

    public function store_post(Request $request) {
        $attributes = $request->validate([
            'title' => 'required|min:10',
            'description' => 'required|min:10',
            'url' => 'required|url|unique:posts'
        ]);
        // $post = new Post();
        // $post->user_id = Auth::user()->user_id;
        // $post->title = $validated['title'];
        // $post->url = $validated['url'];
        // $post->description = $validated['description'];
        // $post->image = "https://www.wykop.pl/cdn/c2526412/no-picture,w207h139.jpg";
        // $post->saveOrFail();
        $attributes['image'] = "https://www.wykop.pl/cdn/c2526412/no-picture,w207h139.jpg";
        Auth::user()->addPost($attributes);
        return redirect("/");
    }

    public function post($id) {
        $post = Post::where(['post_id' => $id])->first();
        return view("post", ['post' => $post]);
    }
}