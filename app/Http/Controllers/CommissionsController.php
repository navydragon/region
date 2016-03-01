<?php

namespace App\Http\Controllers;


use App\Commission;
use App\Http\Requests;
use App\Http\Requests\SurveyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Htpp\Request;
use Auth;
use Session;


class CommissionsController extends Controller
{
    public function index()
    {
        $commissions = Commission::latest('id')->get();
        
        return view('commissions.index',compact('commissions'));
    }

    public function create()
    {
        return view('commissions.create');
    }

    public function show($id)
    {

    	$commission = Commission::findOrFail($id);

    	return view('commissions.show',compact('commission')); 
    }
}
