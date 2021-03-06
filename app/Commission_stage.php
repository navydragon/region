<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Commission_stage extends Model
{
	protected  $fillable = ['title','description','start_at','end_at'];
	
    public function getStartAtAttribute()
    {
        return Carbon::parse($this->attributes['start_at']); 
    }
    public function getEndAtAttribute()
    {
        return Carbon::parse($this->attributes['end_at']); 
    }

    public function commission()
    {
    	return $this->belongsTo('App\Commission');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function find_in_file_binds()
    {
        
        $binds = File_bind::where('bind_type', '=', 'commission_stage')->where('type_id', '=',$this->id);
        return $binds;
    }

}
