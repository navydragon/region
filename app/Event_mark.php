<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_mark extends Model
{
    protected  $fillable = ['event_id','user_id','mark',]; 
}
