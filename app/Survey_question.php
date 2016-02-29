<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_question extends Model
{
    protected  $fillable = ['body',];

    public function survey()
    {
    	return $this->belongsTo('App\Survey');
    }
}
