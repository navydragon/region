<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Survey_question extends Model
{
    protected  $fillable = ['body',];

    public function survey()
    {
    	return $this->belongsTo('App\Survey');
    }

    public function users_pivot()
    {
        return $this->belongsToMany('App\User', 'survey_question_user')->withPivot('answer')->withTimestamps();
    }

    public function user_answer($user_id)
    {
    	$a = $this->users_pivot()->find($user_id);
    	if ($a) 
    	{
    		return $a->pivot->answer;
    	}else{
    		return null;
    	}
    	
    }
}
