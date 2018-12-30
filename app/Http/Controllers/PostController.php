<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\VotePost;
use Embed\Embed;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::paginate(20);
        return view('posts', ['posts' => $posts]);
    }
    
    public function user(Request $request, User $username) {
        return view('user_posts', ['user' => $username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['url' => 'active_url']);
        $url = $request->input('url');
        $info = Embed::create($url, [
            'min_image_width' => 250,
            'min_image_height' => 200,
        ]);
        $images = [['url' => asset('default_post.jpg')]] + $info->images;
        $new_post = [
            'url' => $url,
            'title' => $info->title,
            'images' => $images,
            'description' => $info->description,
        ];
        return view('create_post', ['new_post' => $new_post]);
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
            'url' => 'required|active_url|unique:posts',
            'image' => 'required|url',
        ]);
        $post = Auth::user()->addPost($attributes);
        return redirect(action("PostController@show", ['post' => $post->slug]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comment)
    {
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
     * @return \Illuminate\Httpadd\Response
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => 'required|min:10|max:200',
            'description' => 'required|min:10',
            'url' => 'required|url|unique:posts'
        ]);
        $post->update($attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return response()->json($post->delete());
    }

    public function vote(Request $request, Post $post) {
        $selected = null;
        //if ($post->user != Auth::user()) {
            if ($vote = Auth::user()->votes_posts->where('post_id', $post->post_id)->first()) {
                if ($request->type == $vote->type) {
                    $vote->delete();
                } else {
                    $vote->update(['type' => $request->type]);
                    $selected = $request->type;
                }
            } else {
                $vote = VotePost::create([
                    'user_id' => Auth::user()->user_id,
                    'post_id' => $post->post_id,
                    'type' => $request->type,
                ]);
                $selected = $request->type;
            }
        //}
        $array = [
            'plus' => $post->votes->where('type', 'plus')->count(),
            'minus' => $post->votes->where('type', 'minus')->count(),
            'selected' => $selected,
        ];
        return response()->json($array);
    }
}
