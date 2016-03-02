<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function scopeOfType($query, $type)
    {
        return $query->whereType($type);
    }

    public function commission_stage()
    {
    	return $this->belongsTo('App\Commission_stage');
    }
}
