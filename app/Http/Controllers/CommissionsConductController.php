<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commission;
use App\CommissionLog;
use App\User;
use App\CommissionRole;
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
}
