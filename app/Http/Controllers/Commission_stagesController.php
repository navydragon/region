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
}
