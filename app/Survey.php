<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Survey extends Model
{
    protected  $fillable = ['title','description','published_at',];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function survey_questions()
    {
        return $this->hasMany('App\Survey_question');
    }

    public function find_in_stage($stage)
    {
    	
    	$event = Event::where('type', '=', 'survey')->where('type_id', '=',$this->id)->count();
    	if ($event>0) {return true;}else{return false;}
    }

}


