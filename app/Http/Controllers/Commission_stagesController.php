<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Commission_stageRequest;
use App\Http\Controllers\Controller;
use App\Commission;
use App\Event;
use App\Commission_stage;
use App\File;
use App\File_bind;
use Auth;

class Commission_stagesController extends Controller
{
    public function store(Request $request, Commission $commission,Commission_stageRequest $request)
    {
        //создаем этап
        $commission_stage = new Commission_stage ($request->all());
        $commission->commission_stages()->save($commission_stage);
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
            $file_bind->bind_type = 'commission_stage';
            $file_bind->type_id =  $commission_stage->id;
            $file->file_binds()->save($file_bind);

        }

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
        //удаляем все мероприятия с этапа
        $events = Event::where('commission_stage_id', '=', $id) -> delete();
        //добавляем анкеты
        if ($request->has('surveys'))
        {
            foreach($request->get('surveys') as $key => $val)
            {   
                $event = new Event; 
                $event->commission_stage_id = $id;
                $event->type = "survey";
                $event->type_id = $val;
                $event->save();
                
            }
        }
         

        
		flash()->success('Конфигурация этапа "'.$commission_stage->title.'" изменена!');
    	return redirect('admin/commissions/'.$commission_stage->commission_id);
    }

    public function destroy($id)
    {
        $commission_stage = Commission_stage::findOrFail($id);
        $commission = $commission_stage->commission->id;
        $commission_stage->delete();
        flash()->success('Вопрос успешно удален!');
        return redirect('admin/commissions/'.$commission.'');
    }
}
