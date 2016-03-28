<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Commission;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions = Commission::where('status','=','1')->get();
        return view('home',compact('commissions'));
    }

    public function welcome()
    {
         if (Auth::check())
         {
            return redirect('home');
         }else{
            return view ('welcome');
          }
        
    }
}
