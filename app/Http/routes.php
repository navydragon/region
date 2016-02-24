<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');

Route::get('surveys', 'SurveysController@index');
Route::get('surveys/create', 'SurveysController@create');
Route::get('surveys/{id}', 'SurveysController@show');
Route::post('surveys', 'SurveysController@store');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
