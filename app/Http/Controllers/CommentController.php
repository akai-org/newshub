<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function show(Request $request, Post $post) {
        $array = [];
        foreach ($post->comments as $comment) {
            $next = $comment->jquery_comment();
            if (Auth::user()==$comment->user) {
                $next['created_by_current_user'] = true;
            }
            array_push($array, $next);
        }
        return response()->json($array);
    }

    public function users(Request $request) {
        $array = [];
        foreach (User::all() as $user) {
            array_push($array, $user->jquery_comments());
        }
        return response()->json($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'content' => 'required|filled',
            //'vote_id' => 'exists:comments',
        ]);
        $data['user_id'] = Auth::user()->user_id;
        $data['post_id'] = $post->post_id;
        $data['is_adult'] = false;
        $data['is_visable'] = true;
        $data['fullname'] = Auth::user()->username;
        $comment = $post->addComment($data);
        $return = $comment->jquery_comment();
        $return['is_new'] = true;
        $return['created_by_current_user'] = true;
        return response()->json($return);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user==Auth::user() || Auth::user()->is_admin==true) {
            $attributes = $request->validate([
                'content' => 'required|filled',
            ]);
            $comment->update($attributes);
            return response()->json($comment->jquery_comment());
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user==Auth::user() || Auth::user()->is_admin==true) {
            if ($comment->delete()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }
}
