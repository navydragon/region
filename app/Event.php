<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Survey;
use App\Task;
use App\Test;
use App\Commission_stage;
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

    public function participation($commission,$stage)
    {
        $users = array_pluck(Commission::findOrFail($commission)->common_users(),'id');
        switch ($this->type) {
            case 'survey':
                $survey = Survey::findOrFail($this->type_id);
                $questions = array_pluck($survey->survey_questions()->get(),'id');
                $parts = \DB::table('survey_question_user')
                    ->whereIn('survey_question_id', $questions)
                    ->whereIn('user_id', $users)
                    ->groupBy('user_id')
                    ->get();
                break;

            case 'test':
                $test = Test::findOrFail($this->type_id);
                $parts = \DB::table('test_users')
                    ->where('test_id','=', $test->id)
                    ->whereIn('user_id', $users)
                    ->groupBy('user_id')
                    ->get();
                break;  

            case 'task':
                $task = Task::findOrFail($this->type_id);
                $file_binds = array_pluck($task->find_user_files()->get(),'file_id');
                $parts = \DB::table('files')
                    ->whereIn('id', $file_binds)
                    ->whereIn('user_id', $users)
                    ->groupBy('user_id')
                    ->get();
                   // return count($file_binds);
                break;       
            
            default:
                return '-';
                break;
        }
        return count($parts).'/'.count($users).' ('.(round(count($parts)/count($users)*100)).'%)';
    }
}
