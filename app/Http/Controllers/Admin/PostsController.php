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
        $posts = Post::where('user_id', auth()->id())->get();
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

        $this->authorize('create', new Post);
          $this->validate($request, ['title'=>'required|unique:posts']);

          $post = Post::create([
            'title'=>$request->get('title'),  
            'user_id'=>auth()->id(), 
            'url'=>Str::slug($request->get('title')),
              /* 'url'=>Str::slug($request->get('title')), */
            ]);

          return redirect()->route('admin.posts.edit',$post);
    }

    public function edit(Post $post)
    {
        $this->authorize('view',$post);
        
        return view('admin.posts.edit', [
           'post' => $post,
           'tags' => Tag::all(),
           'categories' => Category::all(),
        ]); 
    
       
    }


       public function update( Post $post, Request $request)
    {
        $this->authorize('update',$post);

        $this->validate($request,[
            'title' => 'required',
            'body'  => 'required',
            'mediumtext' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'published_at' => 'required'
        ]);
               
       /*  $post->title=$request->get('title');
        $post->url=Str::slug($request->get('title'));
        $post->body=$request->get('body');
        $post->mediumtext=$request->get('mediumtext');
        $post->published_at= $request->get('published_at');
        $post->category_id=$request->get('category');
        $post->save(); */

        $post->update($request->all());

        
        $tags = collect($request->get('tags'))->map(function($tag){
            return Tag::find($tag) ? $tag :Tag::create(['name' => $tag])->id;
        });

        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.edit',$post)->with('flash','La publicacion ha sido guardada');
        
    } 

    public function destroy(Post $post)


    {
        $this->authorize('delete',$post);

        $post->tags()->detach();

        $post->photos->each->delete();

         $post->delete();

         return redirect()
           ->route('admin.posts.index')
           ->with('flash', 'La publicacion ha sido eliminada');
    }
    
}
