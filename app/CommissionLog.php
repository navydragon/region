<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionLog extends Model
{
    protected  $fillable = ['commission_id','user_id','text','ip_adress','type','type_id',]; 
}
