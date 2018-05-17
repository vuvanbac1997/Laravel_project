<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
    	'body',
    	'url',
    	'user_id',
    	'comment_id',
    	'comment_type',
    ];
    
    public function commentable(){
    	return $this->morphTo();
    }

    public function user(){
        return $this->hasOne("\App\User", "id", "user_id");
    }
}
