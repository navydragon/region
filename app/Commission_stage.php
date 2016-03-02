<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission_stage extends Model
{
	protected  $fillable = ['title','description','start_at','end_at'];
	
    public function commission()
    {
    	return $this->belongsTo('App\Commission');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
