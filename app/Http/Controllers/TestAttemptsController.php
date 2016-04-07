<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Test_user;
use Parser;

class TestAttemptsController extends Controller
{
    public function show($id)
    {
        $attempt = Test_user::findOrFail($id);
        if (file_exists('tests/'.$id.'.xml')) {
            $xml = simplexml_load_file('tests/'.$id.'.xml');
        } else {
            exit('Не удалось открыть файл с данными о попытке.');
        }

        //просмотр правильных ответов
        $view_right = true;
       return view('user.attempt_show', compact(['attempt', 'xml','view_right']));
    }
}
