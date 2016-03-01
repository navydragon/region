<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Survey_questionRequest;
use App\Http\Controllers\Controller;
use App\Survey;
use App\Survey_question;
class Survey_questionsController extends Controller
{
    public function store(Request $request, Survey $survey,Survey_questionRequest $request)
    {
        $survey_question = new Survey_question ($request->all());
        $survey->survey_questions()->save($survey_question);
        $message = urlencode(iconv("CP1251","UTF-8",'Вопрос успешно добавлен!'));
        flash()->success($message);
    	return back();
    }

     public function edit($id)
    {
        $survey_question = Survey_question::findOrFail($id);
        return view('survey_questions.edit',compact('survey_question'));
    }

    public function update($id,Survey_questionRequest $request)
    {
        $survey_question = Survey_question::findOrFail($id);
        $survey_question->update($request->all());

        $message = urlencode(iconv("CP1251","UTF-8",'Вопрос успешно изменен!'));
        flash()->success($message);

        return redirect('admin/surveys/'.$survey_question->survey_id.'/');
    }
}
