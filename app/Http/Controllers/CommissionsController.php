<?php

namespace App\Http\Controllers;


use App\Commission;
use App\Http\Requests;
use App\Http\Requests\CommissionRequest;
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

    public function store(CommissionRequest $request)
    {

        $commission = new Commission ($request->all());
        Auth::user()->commissions()->save($commission);
         flash()->success('Комиссия успешно создана!');

        return redirect('admin/commissions');
    }

    public function edit($id)
    {
        $commission = Commission::findOrFail($id);
        return view('commissions.edit',compact('commission'));
    }

    public function update($id,CommissionRequest $request)
    {
        $commission = Commission::findOrFail($id);
        $commission->update($request->all());
        flash()->success('Комиссия успешно изменена!');
        return redirect('admin/commissions');
    }

     public function destroy($id)
    {
        Commission::findOrFail($id)->delete();
        flash()->success('Комиссия успешно удалена!');
        return redirect('admin/commissions');
    }
}
