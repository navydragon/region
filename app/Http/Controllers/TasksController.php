<?php

namespace App\Http\Controllers;

use App\Task;
use App\Event;
use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Htpp\Request;
use Auth;
use Session;

class TasksController extends Controller
{
    public function index()
    {
    	$tasks = Task::latest('id')->get();

    	return view('tasks.index',compact('tasks'));
    }

    public function show($id)
    {

    	$task = Task::findOrFail($id);

    	return view('tasks.show',compact('task')); 
    }

     public function create()
    {
    	return view('tasks.create'); 
    }

     public function store(TaskRequest $request)
    {

        $task = new Task ($request->all());
        Auth::user()->tasks()->save($task);
         flash()->success('Задание успешно создано!');

    	return redirect('admin/tasks/'.$task->id);
    }
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit',compact('task'));
    }

    public function update($id,TaskRequest $request)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        flash()->success('Задание успешно изменено!');
        return redirect('admin/tasks');
    }

    public function destroy($id)
    {
        //удаляем из этапов
        $events = Event::where('type', '=', 'task')->where('type_id', '=',$id);
        $events->delete();

        $task = Task::findOrFail($id);
        $binds = $task->find_in_file_binds()->delete();
        $task->delete();
        flash()->success('Задание успешно удалено!');
        return redirect('admin/tasks');
    }
}
