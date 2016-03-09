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



Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');


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

Route::group(['middleware' => ['web']], function () 
{
    //Route::get('surveys', 'SurveysController@index');
	//Route::get('surveys/create', 'SurveysController@create');
	//Route::get('surveys/{id}', 'SurveysController@show');
	//Route::post('surveys', 'SurveysController@store');
	//Route::get('surveys/{id}/edit', 'SurveysController@edit');
	Route::auth();
	Route::get('/', function () {return view('welcome');}); 


});



Route::group(['middleware' => ['web','auth']], function () 
{
	Route::get('/home', 'HomeController@index');
	Route::get('/admin', function () {return view('admin/index');});

	Route::resource('admin/commissions','CommissionsController');
	
	Route::resource('admin/surveys','SurveysController');
	Route::resource('admin/tasks','TasksController');
	Route::resource('admin/tests','TestsController');

	Route::post('admin/surveys/{survey}/survey_questions', 'Survey_questionsController@store');
	Route::get('admin/survey_questions/{survey_question}/edit', 'Survey_questionsController@edit');
	Route::patch('admin/survey_questions/{survey_question}', 'Survey_questionsController@update');
	Route::delete('admin/survey_questions/{survey_question}', 'Survey_questionsController@destroy');

	Route::get('admin/commission_stages/create','Commission_stagesController@create');
	Route::get('admin/commission_stages/{commission_stage}/edit','Commission_stagesController@edit');
	Route::patch('admin/commission_stages/{commission_stage}','Commission_stagesController@update');
	Route::post('admin/commissions/{commission}/commission_stages', 'Commission_stagesController@store'); 
	Route::delete('admin/commission_stages/{commission_stage}', 'Commission_stagesController@destroy');

	Route::post('admin/files', 'FilesController@store'); 
	Route::delete('admin/files/{file}', 'FilesController@destroy');

	Route::get('admin/tests/{test}/questions/create','QuestionsController@create');
	Route::get('admin/tests/{test}/questions/{question}','QuestionsController@edit');
	Route::post('admin/tests/{test}/questions','QuestionsController@store');
	Route::delete('admin/questions/{question}','QuestionsController@destroy');
	Route::patch('admin/questions/{question}','QuestionsController@update');

	Route::post('admin/questions/{question}/answers','AnswersController@store');
	Route::delete('admin/answers/{answer}','AnswersController@destroy');
	Route::get('admin/answers/{answer}/edit','AnswersController@edit');
	Route::patch('admin/answers/{answer}','AnswersController@update');
});

