<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Carbon\Carbon;

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

        $post = new Post();
        $post->title = "Mi primer post";
        $post->mediumtext = "Extracto del primer post";
        $post->body = "Contenido del primer post"; 
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->save();

        $post = new Post();
        $post->title = "Mi segundo post";
        $post->mediumtext = "Extracto del segundo post";
        $post->body = "Contenido del segundo post"; 
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();

        $post = new Post();
        $post->title = "Mi Tercer post";
        $post->mediumtext = "Extracto del tercer post";
        $post->body = "Contenido del tercer post"; 
        $post->published_at = Carbon::now()->subDays(5);
        $post->category_id = 2;
        $post->save();
        //
    }
}
