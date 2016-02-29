<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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
}


