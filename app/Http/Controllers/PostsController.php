<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        

        return view('posts.show', compact ('post'));
    }

   
    
}
