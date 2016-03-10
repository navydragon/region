<?php

namespace App\Http\Controllers;


use App\Survey;
use App\Event;
use App\Http\Requests;
use App\Http\Requests\SurveyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Htpp\Request;
use Auth;
use Session;


class SurveysController extends Controller
{
    public function index()
    {
    	$surveys = Survey::latest('id')->get();

    	return view('surveys.index',compact('surveys'));
    }

    public function show($id)
    {

    	$survey = Survey::findOrFail($id);

    	return view('surveys.show',compact('survey')); 
    }

     public function create()
    {
    	return view('surveys.create'); 
    }

    public function store(SurveyRequest $request)
    {

    	//Survey::create($request->all());
        $survey = new Survey ($request->all());
        //$request->user()->survey()->save($survey);
        Auth::user()->surveys()->save($survey);
        //$survey = new Survey;
        //$survey->title = $input['title'];
         flash()->success('Анкета успешно создана!');

    	return redirect('admin/surveys/'.$survey->id);
    }
    public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        return view('surveys.edit',compact('survey'));
    }

    public function update($id,SurveyRequest $request)
    {
        $survey = Survey::findOrFail($id);
        $survey->update($request->all());
        flash()->success('Анкета успешно изменена!');
        return redirect('admin/surveys');
    }

    public function destroy($id)
    {
        //удаляем из этапов
        $events = Event::where('type', '=', 'survey')->where('type_id', '=',$id);
        $events->delete();

        Survey::findOrFail($id)->delete();
        flash()->success('Анкета успешно удалена!');
        return redirect('admin/surveys');
    }
}
