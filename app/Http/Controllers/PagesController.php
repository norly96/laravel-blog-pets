<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

/* use App\Models\Post; */


class PagesController extends Controller
{
    public function home()
    {
        /* $posts = \App\Models\Post::whereNotNull('published_at')
        ->where('published_at','<=', Carbon::now())
        ->latest('published_at')->get(); */

        $posts = Post::published()->get();

         return view('welcome', compact('posts'));
    }

    public function lista()
    {
        /* $posts = \App\Models\Post::whereNotNull('published_at')
        ->where('published_at','<=', Carbon::now())
        ->latest('published_at')->get(); */

        $posts = Post::published()->paginate(4);

         return view('blog', compact('posts'));
    }

    public function nosotros()
    {
        return view('pages.nosotros');
    }

    public function contacto()
    {
        return view('pages.contacto');
    }


}
