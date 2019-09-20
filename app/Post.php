<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'image', 'body'
    ];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    
}
