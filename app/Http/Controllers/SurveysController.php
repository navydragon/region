<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Survey;

class SurveysController extends Controller
{
    public function index()
    {
    	$surveys = Survey::all();

    	return view('surveys.index',compact('surveys'));
    }

    public function show($id)
    {
    	
    	$survey = Survey::findOrFail($id);

    	return view('surveys.show',compact('survey')); 
    }
}
