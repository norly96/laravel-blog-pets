<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        
        $post = new Category();
        $post->name = "Perros";
        $post->save();


        $post = new Category();
        $post->name = "Gatos";
        $post->save();
        //
    }
}
