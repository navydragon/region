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

    public function test_user_pivot()
    {
        return $this->belongsToMany('App\User', 'test_users')->withPivot('earned')->withPivot('total')->withTimestamps();
    }


    public function find_in_stage($stage)
    {
    	
    	$event = Event::where('type', '=', 'test')->where('type_id', '=',$this->id)->where('commission_stage_id','=',$stage);
    	return $event;
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }


}
