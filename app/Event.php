<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected  $fillable = ['commission_stage_id','type','type_id',]; 

    public function scopeOfType($query, $type)
    {
        return $query->whereType($type);
    }

    public function commission_stage()
    {
    	return $this->belongsTo('App\Commission_stage');
    }
}
