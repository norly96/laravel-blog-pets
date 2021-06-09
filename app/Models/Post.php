<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $dates = ['published_at'];

    public function category($value='')     //$post->category->name
    {
  return $this->belongsTo(category::class);
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

}
