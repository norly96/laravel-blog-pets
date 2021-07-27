<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    use HasFactory;
    protected $dates = ['published_at'];
    protected $fillable = ['title','url','body','mediumtext','category_id','published_at','user_id'];
    

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

    public function owner()
    {
  return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
      $query->whereNotNull('published_at')
        ->where('published_at','<=', Carbon::now())
        ->latest('published_at');
    }

    public function setPublishedAtAttribute($published_at)
    {
      $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null; 
    }

    
}
