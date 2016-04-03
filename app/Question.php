<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     protected  $fillable = ['title',];

     public function test()
    {
    	return $this->belongsTo('App\Test');
    }
     public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function right_answers()
    {
    	return $this->answers()->where('right','=',1);

    }

    public function checkSingle($value)
    {
        if ($value == $this->right_answers()->first()->id) { return '1';}else{return '0';}
    }

    public function checkMultiple($value)
    {
        foreach ($this->right_answers as $right_answer) 
        {
            if (in_array($right_answer->id,$value)) {$correct='1';}else{$correct='0';}    
        }
        return $correct;
    }
}
