<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commission;
use App\CommissionLog;
class CommissionsConductController extends Controller
{
    public function index()
    { 
       	 $commissions = Commission::latest('id')->get();
        
        return view('commissions.conduct.index',compact('commissions'));
    }

    public function show($commission)
    { 
       	 $commission = Commission::FindOrFail($commission);
       	 $log_messages = CommissionLog::latest('id')->take(10)->get();
        
        return view('commissions.conduct.show',compact('commission','log_messages'));
    }
}
