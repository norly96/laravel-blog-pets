<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Post;
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
        $post = new Post;
        $post->title = "Mi primer post";
        $post->mediumtext = "Extracto del primer post";
        $post->body = "Contenido del primer post"; 
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();
        //
    }
}
