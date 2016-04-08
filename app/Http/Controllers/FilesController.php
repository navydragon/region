<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CommissionRequest;
use App\Http\Controllers\Controller;
use App\File;
use App\File_bind;
use App\CommissionLog;
use Auth;
use Activity;

class FilesController extends Controller
{
   public function store(Request $request)
    {
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
            $file_bind->bind_type = $request->type;
            $file_bind->type_id =  $request->id;
            $file->file_binds()->save($file_bind);
            flash()->success('Файл успешно добавлен!');

            if (isset($request->commission))
            {
                $log = CommissionLog::create(['commission_id'=>$request->commission,'user_id'=>Auth::user()->id,'type'=>$request->type,'type_id'=>$request->id,'text'=> Auth::user()->short_name().' подгрузил файл.']);
            }
        }

        return back();
    }

    public function destroy($file)
    {
        File::findOrFail($file)->delete();
        flash()->success('Файл успешно удален');
        return back();
    }
}
