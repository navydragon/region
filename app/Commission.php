<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Commission extends Model
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

  	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function commission_stages()
    {
        return $this->hasMany('App\Commission_stage');
    }

    public function find_in_file_binds()
    {
        
        $binds = File_bind::where('bind_type', '=', 'commission')->where('type_id', '=',$this->id);
        return $binds;
    }
}

