<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_bind extends Model
{
    protected  $fillable = ['bind_type','type_id',]; 

    public function file()
    {
    	return $this->belongsTo('App\File');
    }

    public function scopeType_id($query, $id)
    {
    	return $query->where('type_id','=',$id);
    }
}
