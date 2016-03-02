<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Commission_stageRequest;
use App\Http\Controllers\Controller;
use App\Commission;
use App\Commission_stage;

class Commission_stagesController extends Controller
{
    public function store(Request $request, Commission $commission,Commission_stageRequest $request)
    {
        $commission_stage = new Commission_stage ($request->all());
        $commission->commission_stages()->save($commission_stage);
        flash()->success('Этап успешно создан!');
    	return back();
    }

    public function edit ($id)
    {
    	$commission_stage = Commission_stage::findOrFail($id);
    	return view('commission_stages.edit',compact('commission_stage')); 
    }

    public function update ($id,Commission_stageRequest $request)
    {
    	$commission_stage = Commission_stage::findOrFail($id);
        $commission_stage->update($request->all());
         $ids=0;
         foreach($request->get('surveys') as $key => $val)
		 {
		 	   $ids++;
		 }
 
		
	    	//How To: Validate an array of form fields with Laravel
		
    	return $ids;
    }
}
