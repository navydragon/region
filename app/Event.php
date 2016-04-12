<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Survey;
use App\Task;
use App\Test;
class Event extends Model
{
	protected  $fillable = ['commission_stage_id','type','type_id',]; 

    public function scopeOfType($query, $type)
    {
        return $query->whereType($type);
    }

    public function commission_stage()
    {
    	return $this->belongsTo('App\Commission_stage');
    }

    public function event_description()
    {
    	$e_d = [];
    	switch ($this->type) 
    	{
    		case 'survey': $e_d["type"]='Анкета'; $event=Survey::findOrFail($this->type_id); $e_d["title"] = $event->title; $e_d["sublink"]='/surveys/'.$event->id; break;
    		case 'test': $e_d["type"]='Тест'; $event=Test::findOrFail($this->type_id); $e_d["title"]= $event->title; $e_d["sublink"]='/tests/'.$event->id; break;
    		case 'task': $e_d["type"]='Задание'; $event=Task::findOrFail($this->type_id); $e_d["title"]= $event->title; $e_d["sublink"]='/tasks/'.$event->id; break;
    		default:  $e_d["type"]='Не определено'; $e_d["title"] = '-'; break;
    	}
    	return (object)$e_d;
    }

    public function participation()
    {
        # code...
    }
}
