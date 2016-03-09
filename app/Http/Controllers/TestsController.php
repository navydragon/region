<?php

namespace App\Http\Controllers;

use App\Test;
use App\Http\Requests;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Htpp\Request;
use Auth;
use Session;

class TestsController extends Controller
{
     public function index()
    {
    	$tests = Test::latest('id')->get();

    	return view('tests.index',compact('tests'));
    }

    public function show($id)
    {

    	$test = Test::findOrFail($id);

    	return view('tests.show',compact('test')); 
    }

     public function create()
    {
    	return view('tests.create'); 
    }

     public function store(TestRequest $request)
    {

        $test = new Test ($request->all());
        Auth::user()->tests()->save($test);
         flash()->success('Тестирование успешно создано!');

    	return redirect('admin/tests');
    }
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('tests.edit',compact('test'));
    }

    public function update($id,TestRequest $request)
    {
        $test = Test::findOrFail($id);
        $test->update($request->all());
        flash()->success('Тестирование успешно изменено!');
        return redirect('admin/tests');
    }

    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $binds = $test->find_in_file_binds()->delete();
        $test->delete();
        flash()->success('Тестирование успешно удалено!');
        return redirect('admin/tests');
    }
}
