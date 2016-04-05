<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Commission;
use App\Survey;
use App\Task;
use App\Test;
use App\Question;
use App\Answer;


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

     public function test_show($commission,$test)
    {
        $commission = Commission::findOrFail($commission);
        $test = Test::findOrFail($test);
        return view('user.commissions.test_show',compact(['commission','test'])); 
    }

    public function test_store(Commission $commission,Test $test, Request $request)
    { 
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><test></test>');
            $xml->addAttribute('version', '1.0');
            $xml->addChild('datetime', date('Y-m-d H:i:s'));
            
            $_questions =  $xml->addChild('questions');
            $earned = 0; //заработанные баллы
            $total = $test->questions->count();
            foreach($request->get('questions') as $key => $val)
            {
                //ищем вопрос в базе
                $question = Question::findOrFail($key);
                //заполняем вопрос
                $_question = $_questions->addChild('question',$question->title);
                $_question->addAttribute('id',$key);
                if (is_array($val)) 
                { 
                    //заполняем тип
                    $_question->addAttribute('type','multiple');
                    //заполняем правильность 
                    $correct = $question->checkMultiple($val);
                    $_question->addAttribute('correct',$correct);
                }
                else
                {
                    //заполняем тип
                    $_question->addAttribute('type','single');
                    //заполняем правильность
                    $correct = $question->checkSingle($val);
                    $_question->addAttribute('correct',$correct);
                   
                }
                //накапливаем баллы
                 $earned = $earned + $correct;
                //заполняем ответы
                $_answers = $_question->addChild('answers');
                foreach ($question->answers as $answer) 
                {
                    $_answer = $_answers->addChild('answer',$answer->body);
                    $_answer->addAttribute('right',$answer->right);
                    if (is_array($val)) 
                    {
                        if (in_array($answer->id,$val))
                        {
                            $_answer->addAttribute('selected','1');
                        }
                        else
                        {
                            $_answer->addAttribute('selected','0');
                        }
                    }
                    else
                    { 
                        if($val==$answer->id)
                        {
                            $_answer->addAttribute('selected','1');
                        } 
                        else
                        {
                            $_answer->addAttribute('selected','0');
                        }
                    }    
                }
            }

            $result = $xml->addChild('earned',$earned);
            $result = $xml->addChild('total',$total);

            $user = $xml->addChild('user');
            $user->addChild('id', Auth::user()->id);

            //создаем запись о тесте
            Auth::user()->test_user_pivot()->attach($test->id, ['earned' => $earned,'total' => $total]);
            $id = Auth::user()->test_user_pivot()->get()->last()->pivot->id;


            $xml->saveXML('tests/'.$id.'.xml');

            
    //return $response;
      //return $request->toArray();
       return back();
    }
}
