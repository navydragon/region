<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     protected  $fillable = ['title',];

     public function test()
    {
    	return $this->belongsTo('App\Test');
    }
     public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
