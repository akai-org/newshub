<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home() {
        return view('posts');
    }

    public function user() {
        return view('user');
    }
}
