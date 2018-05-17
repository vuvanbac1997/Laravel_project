<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
    	'name', 
    	'decription', 
    	'company_id', 
    	'user_id', 
    	'days',
    ];

    public function user(){
        return $this-> belongsToMany('App\User');
    }

    public function company(){
        return $this-> belongsTo('App\Company');
    }
    
    // public function comments(){
    //     return $this-> morphMany('App\Comment', 'comment');
    // }
    public function comments(){
        return $this-> hasMany('App\Comment', 'comment_id');
    }
}
