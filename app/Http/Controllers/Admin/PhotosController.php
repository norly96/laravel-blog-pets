<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    

    public function store(Post $post)
    {

        $this->validate(request(),[
            'photo' => 'required|image|max:2048'
        ]);

        $photo = request()->file('photo')->store('public');

       
        
        Photo::create([
            'url' => Storage::url($photo),
            'post_id' => $post->id
        ]);

       
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPath = str_replace('storage','public',$photo->url); //reemplazamos storage por public en la url de photo
        
        Storage::delete($photoPath);

        return back()->with('flash','Foto eliminada');
    }

}
