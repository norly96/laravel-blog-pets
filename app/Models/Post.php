<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    use HasFactory;
    protected $dates = ['published_at'];
    protected $fillable = ['title','url'];
    

    public function getRouteKeyName()
    {
      return 'url';
    }

    public function category($value='')     //$post->category->name
    {
  return $this->belongsTo(category::class);
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

   /*  public function photos()
    {
        return $this->hasOne(Photo::class);
    } */

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query)
    {
      $query->whereNotNull('published_at')
        ->where('published_at','<=', Carbon::now())
        ->latest('published_at');
    }

}
