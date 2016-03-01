<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected  $fillable = ['title','description',];

  	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function commission_stages()
    {
        return $this->hasMany('App\Commission_stage');
    }
}
