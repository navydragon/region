<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;
use App\Test;
use App\Question;

class QuestionsController extends Controller
{
    public function create ($test)
    {
        $test = Test::findOrFail($test);
        return view('questions.create',compact('test')); 
    }

     public function store($test, QuestionRequest $request)
    {
    	$test = Test::findOrFail($test);
        $question = new Question ($request->all());
        $test->questions()->save($question);
        flash()->success('Вопрос успешно добавлен!');

    	return redirect('admin/tests/'.$test->id.'/questions/'.$question->id);
    }

    public function destroy($question)
    {
        $question = Question::findOrFail($question)->delete();
        flash()->success('Вопрос успешно удален!');
        return back();
    }

    public function edit($test,$question)
    {
        $question = Question::findOrFail($question);
        return view('questions.edit',compact('question'));
    }

    public function update($question,QuestionRequest $request)
    {
        $question = Question::findOrFail($question);
        $question->update($request->all());
        flash()->success('Текст вопроса успешно изменен!');
        return back();
    }
}
