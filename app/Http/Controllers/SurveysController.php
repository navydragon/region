<?php

namespace App\Http\Controllers;


use App\Survey;
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
         $message = urlencode(iconv("CP1251","UTF-8",'Анкета успешно создана!'));
         flash()->success($message);

    	return redirect('admin/surveys');
    }
    public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        $message = urlencode(iconv("CP1251","UTF-8",'Анкета успешно изменена!'));
        flash()->success($message);
        return view('surveys.edit',compact('survey'));
    }

    public function update($id,SurveyRequest $request)
    {
        $survey = Survey::findOrFail($id);
        $survey->update($request->all());
        return redirect('admin/surveys');
    }
}
