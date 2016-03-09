<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use App\Http\Requests;
use App\Http\Requests\AnswerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Htpp\Request;


class AnswersController extends Controller
{
    public function store($question, AnswerRequest $request)
    {
    	$question = Question::findOrFail($question);
        $answer = new Answer ($request->all());
        if ($request->right) {$answer->right = true;}
        $question->answers()->save($answer);
        flash()->success('Ответ успешно добавлен!');

    	return back();
    }

    public function edit($answer)
    {
        $answer = Answer::findOrFail($answer);
        return view('answers.edit',compact('answer'));
    }

    public function destroy($answer)
    {
        $answer = Answer::findOrFail($answer)->delete();
        flash()->success('Ответ успешно удален!');
        return back();
    }

    public function update($answer,AnswerRequest $request)
    {
        $answer = Answer::findOrFail($answer);
        $answer->update($request->all());
	    if ($request->right) {$answer->right = true;}else{$answer->right = false;}
	    $answer->save();

	    $question = $answer->question;
	    $test = $question->test;
        flash()->success('Ответ успешно изменен!');
       return redirect('admin/tests/'.$test->id.'/questions/'.$question->id);
    }
}
