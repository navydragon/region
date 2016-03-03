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

    public function find_in_file_binds()
    {
        
        $binds = File_bind::where('bind_type', '=', 'commission')->where('type_id', '=',$this->id);
        return $binds;
    }
}

