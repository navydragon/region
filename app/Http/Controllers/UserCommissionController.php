<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Commission;


class UserCommissionController extends Controller
{
     public function join($id)
    {
    	$commission = Commission::findOrFail($id);
    	Auth::user()->commissions_pivot()->attach($commission);

    	return view('user.commissions.show',compact('commission')); 
    }

     public function leave($commission)
    {
    	Auth::user()->commissions_pivot()->detach($commission);
    	return back();
    }
}
