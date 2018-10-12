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
        
        'title', 'body', 'image','user_id'
    ];

    public function user()
    {
    	return $this->belongTo(User::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class)->limit(15);
    }
}
