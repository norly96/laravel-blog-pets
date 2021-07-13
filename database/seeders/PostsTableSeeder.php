<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Tag::truncate();

        $post = new Post();
        $post->title = "Mi primer post";
        $post->url = Str::slug("Mi primer post");
        $post->mediumtext = "Extracto del primer post";
        $post->body = "Contenido del primer post"; 
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 1']));

        $post = new Post();
        $post->title = "Mi segundo post";
        $post->url = Str::slug("Mi segundo post");
        $post->mediumtext = "Extracto del segundo post";
        $post->body = "Contenido del segundo post"; 
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 2']));

        $post = new Post();
        $post->title = "Mi Tercer post";
        $post->url = Str::slug("Mi Tercer post");
        $post->mediumtext = "Extracto del tercer post";
        $post->body = "Contenido del tercer post"; 
        $post->published_at = Carbon::now()->subDays(5);
        $post->category_id = 2;
        $post->save();
        
        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3']));
    }
}
