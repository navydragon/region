<?php

namespace App\Http\Controllers;


use App\Survey;
use App\Http\Controllers\Controller;
use Request;


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

    public function store()
    {
    	$input = Request::all(); 
    	
    	//$survey = new Survey;
    	//$survey->title = $input['title'];
    	Survey::create($input);
    	return redirect('surveys');
    }
}
