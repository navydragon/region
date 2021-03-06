<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected  $fillable = ['title','description',];
   
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function find_in_file_binds()
    {
        
        $binds = File_bind::where('bind_type', '=', 'task')->where('type_id', '=',$this->id);
        return $binds;
    }

    public function find_user_files()
    {
        
        $binds = File_bind::where('bind_type', '=', 'user_task')->where('type_id', '=',$this->id);
        return $binds;
    }

    public function find_in_stage($stage)
    {
    	
    	$event = Event::where('type', '=', 'task')->where('type_id', '=',$this->id)->where('commission_stage_id','=',$stage);
    	return $event;
    }
}
