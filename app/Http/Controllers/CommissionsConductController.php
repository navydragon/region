<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commission;
use App\Event;
use App\CommissionLog;
use App\User;
use App\CommissionRole;
use App\Event_mark;
use App\Test_user;

class CommissionsConductController extends Controller
{
    public function index()
    { 
       	 $commissions = Commission::latest('id')->get();
        
        return view('commissions.conduct.index',compact('commissions'));
    }

    public function show($commission)
    { 
       	 $commission = Commission::FindOrFail($commission);
       	 $log_messages = CommissionLog::latest('id')->take(10)->get();
        
        return view('commissions.conduct.show',compact('commission','log_messages'));
    }

    public function change_role($commission,$user,$role)
    {
    	$user = User::FindOrFail($user);
    	$role = CommissionRole::FindOrFail($role);
    	\DB::table('commission_user')
            ->where('commission_id', $commission)
            ->where('user_id', $user->id)
            ->update(['role_id' => $role->id]);
        flash()->success('Роль пользователя <b>'.$user->full_name().'</b> успешно изменена на "<b>'.$role->name.'</b>"');
        return back();
    }

    public function event_marks($commission,$event)
    {
        $commission = Commission::findOrFail($commission);
        $event = Event::findOrFail($event);

        return view('commissions.conduct.event_marks', compact(['commission', 'event']));
    }

    public function event_marks_store(Request $request, $commission, $event)
    {
        $mark = str_replace(',', '.', $request->get('value'));
           //$post has the Id of post to be edited
    Event_mark::where('user_id','=',$request->pk)->where('event_id','=',$event)->delete();
    // ловим user_id
    $user_id = $request->get('pk');

    // catching the new comment
    Event_mark::create(['event_id' => $event,'user_id' => $user_id,'mark'=>$mark]);
    }

    public function test_details( $commission, $event)
    {
        $commission = Commission::findOrFail($commission);
        $event = Event::findOrFail($event);
        return view('commissions.conduct.test_details', compact(['commission', 'event']));
    }
    public function test_attempt_details($commission, $event, $id)
    {
        $commission = Commission::findOrFail($commission);
        $event = Event::findOrFail($event);
        $attempt = Test_user::findOrFail($id);
        $user = User::findOrFail($attempt->user_id);
        if (file_exists('tests/'.$id.'.xml')) {
            $xml = simplexml_load_file('tests/'.$id.'.xml');
        } else {
            exit('Не удалось открыть файл с данными о попытке.');
        }
        return view('commissions.conduct.test_attempt_details', compact(['commission', 'event','attempt','xml','user']));
    }
}
