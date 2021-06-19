<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Models\Post; */


class PagesController extends Controller
{
    public function home()
    {
        $posts = \App\Models\Post::latest('published_at')->get();
         return view('welcome', compact('posts'));
    }
}
