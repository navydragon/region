<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Commission;
use App\Survey;
use App\Task;

class UserCommissionController extends Controller
{
     public function join($id)
    {
    	$commission = Commission::findOrFail($id);
    	Auth::user()->commissions_pivot()->attach($commission);

    	return redirect('commissions/'.$id);
    }

     public function leave($commission)
    {
    	Auth::user()->commissions_pivot()->detach($commission);
    	return back();
    }

     public function show($id)
    {
        $commission = Commission::findOrFail($id);
        return view('user.commissions.show',compact('commission')); 
    }

    public function survey_show($commission, $survey)
    {
        $commission = Commission::findOrFail($commission);
        $survey = Survey::findOrFail($survey);
        return view('user.commissions.survey_show',compact(['commission','survey'])); 
    }

    public function survey_store(Request $request)
    {
        foreach ($request->sq as $key => $value)
        {   
            Auth::user()->survey_questions_pivot()->detach($key);
            Auth::user()->survey_questions_pivot()->attach($key, ['answer' => $value]);
            
        }
        return redirect('commissions/'.$request->commission);
    }

     public function task_show($commission,$task)
    {
        $commission = Commission::findOrFail($commission);
        $task = Task::findOrFail($task);
        return view('user.commissions.task_show',compact(['commission','task'])); 
    }
}
