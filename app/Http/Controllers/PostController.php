<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|min:10|max:200',
            'description' => 'required|min:10',
            'url' => 'required|url|unique:posts'
        ]);
        $attributes['image'] = "https://www.wykop.pl/cdn/c2526412/no-picture,w207h139.jpg";
        $post = Auth::user()->addPost($attributes);
        return redirect(action("PostController@show", ['slug' => $post->slug]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Comment $comment)
    {
        $post = Post::where(['slug' => $slug])->first();
        $attributes = ['post' => $post];
        if ($comment) {
            $attributes['comment'] = $comment->comment_id;
        }
        return view("post", $attributes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $attributes = $request->validate([
            'title' => 'required|min:10|max:200',
            'description' => 'required|min:10',
            'url' => 'required|url|unique:posts'
        ]);
        Post::where(['slug' => $slug])->update($attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Post::find(['slug' => $slug])->delete();
    }
}
