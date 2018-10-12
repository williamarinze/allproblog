<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'content','post_id','user_id','is_approved'
    ];

    public function user()
    {
    	return $this->belongTo(User::class);
    }
   public function Post()
    {
    	return $this->belongTo(Post::class);
    }
}
