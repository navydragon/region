<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected  $fillable = ['title','description','duration','question_count'];
   
    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    public function find_in_stage($stage)
    {
    	
    	$event = Event::where('type', '=', 'test')->where('type_id', '=',$this->id);
    	return $event;
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }


}
