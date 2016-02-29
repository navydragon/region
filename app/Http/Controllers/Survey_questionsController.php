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
        return redirect('admin/surveys/'.$survey_question->survey_id.'/');
    }
}
