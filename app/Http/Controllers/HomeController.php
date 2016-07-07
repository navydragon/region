<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Commission;
use Illuminate\Http\Request;
use Auth;
use Image;



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

    public function profile_show()
    {
        $user = Auth::user();
        return view('edit_profile',compact('user'));
    }

    public function profile_pers_data_update(UserRequest $request)
    {
        Auth::user()->update($request->all());
        flash()->success('Данные успешно изменены!');
        return back();
    }

    public function profile_photo_update(UserRequest $request)
    {
        $file_path = public_path() .'/uploads/avatars/'.Auth::user()->email;
        $file_name = $request['avatar_url']->GetClientOriginalName();
        $image = Image::make($request['avatar_url']->GetRealPath());
        $image->crop(250,250);
        $image->save($file_path.'/'.$file_name);
        Auth::user()->avatar_url = $file_name;
        Auth::user()->save();
        flash()->success('Фотография успешно изменена!');
        return back();
    }

    public function profile_password_update(UserRequest $request)
    {
        
        Auth::user()->password = bcrypt($request->password);
        Auth::user()->save();
        flash()->success('Пароль успешно изменен!');
        return back();
    }
}
