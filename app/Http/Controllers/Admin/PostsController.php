<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /* public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags') );
    } */

    public function store(Request $request)
    {
          $this->validate($request, ['title'=>'required']);
          $post = Post::create([
            'title'=>$request->get('title'),  
            'url'=>Str::slug($request->get('title')),
              /* 'url'=>Str::slug($request->get('title')), */
            ]);

          return redirect()->route('admin.posts.edit',$post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories', 'tags','post') );
    
       
    }


       public function update( Post $post, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'mediumtext' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'published_at' => 'nullable'
        ]);

       
        $post->title=$request->get('title');
        $post->url=Str::slug($request->get('title'));
        $post->body=$request->get('body');
        $post->mediumtext=$request->get('mediumtext');
        $post->published_at=Carbon::parse($request->get('published_at'));
        $post->category_id=$request->get('category');
        $post->save();

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit',$post)->with('flash','Tu publicacion ha sido guardada');
        
    } 

    
}
