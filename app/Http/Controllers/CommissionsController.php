<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CommissionRequest;
use App\Http\Controllers\Controller;
use App\Commission;
use App\Event;
use App\Commission_stage;
use App\File;
use App\File_bind;
use Auth;


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

    public function store(Request $request,CommissionRequest $request)
    {

        $commission = new Commission ($request->all());
        Auth::user()->commissions()->save($commission);
        //загружаем файл
        if ($request->file<>'')
        {
            $source = $request->file;
           
            $file = new File;
            $path = $file->upload($source);
            $file->user_id = Auth::user()->id;
            $file->title = $request->filename;
            $file->type = substr($path, strrpos($path, '.') + 1);
            $file->path = $path;
            $file->save();

            $file_bind = new File_bind;
            $file_bind->bind_type = 'commission';
            $file_bind->type_id =  $commission->id;
            $file->file_binds()->save($file_bind);

        }
        
         Auth::user()->commissions_pivot()->attach($commission->id);
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
        $commission = Commission::findOrFail($id);
        $binds = $commission->find_in_file_binds()->delete();
        $commission->delete();
        flash()->success('Комиссия успешно удалена!');
        return redirect('admin/commissions');
    }
}
    