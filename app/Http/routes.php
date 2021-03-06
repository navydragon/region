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
	Route::auth();
	Route::get('/', 'HomeController@welcome'); 


});


Route::group(['middleware' => ['web','auth']], function () 
{
	Route::get('/home', 'HomeController@index');
	
	Route::get('/profile', 'HomeController@profile_show');
	Route::patch('/profile/pers_data', 'HomeController@profile_pers_data_update');
	Route::patch('/profile/photo', 'HomeController@profile_photo_update');
	Route::delete('/profile/photo', 'HomeController@profile_photo_destroy');
	Route::patch('/profile/password', 'HomeController@profile_password_update');
	Route::patch('/profile/other', 'HomeController@profile_other_update');

	Route::get('commissions/{commission}/join','UserCommissionController@join');
	Route::get('commissions/{commission}/leave','UserCommissionController@leave');
	Route::get('commissions/{commission}','UserCommissionController@show');
	Route::get('commissions/{commission}/surveys/{survey}','UserCommissionController@survey_show');
	Route::post('commissions/{commission}/surveys/{survey}','UserCommissionController@survey_store');
	Route::get('commissions/{commission}/tasks/{task}','UserCommissionController@task_show');
	Route::get('commissions/{commission}/tests/{test}','UserCommissionController@test_show');
	Route::post('commissions/{commission}/tests/{test}','UserCommissionController@test_store');
	

	Route::get('test_attempts/{test_attempt}','TestAttemptsController@show');

		Route::post('admin/files', 'FilesController@store'); 
	Route::delete('admin/files/{file}', 'FilesController@destroy');
});



Route::group(['middleware' => ['web','auth','executive']], function () 
{
	Route::get('/admin', function () {return view('admin/index');});

	Route::resource('admin/commissions','CommissionsController');
	Route::resource('admin/commissions/conduct','CommissionsConductController');

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

	Route::get('admin/commissions_conduct','CommissionsConductController@index');
	Route::get('admin/commissions_conduct/{commission}','CommissionsConductController@show');
	Route::get('admin/commissions_conduct/{commission}/change_role/{user}/{role}','CommissionsConductController@change_role');

	Route::get('admin/commissions_conduct/{commission}/marks/events/{event}','CommissionsConductController@event_marks');
	Route::post('admin/commissions_conduct/{commission}/marks/events/{event}','CommissionsConductController@event_marks_store');

	Route::get('admin/commissions_conduct/{commission}/details/tests/{event}','CommissionsConductController@test_details');
	Route::get('admin/commissions_conduct/{commission}/details/tasks/{event}','CommissionsConductController@task_details');
	Route::get('admin/commissions_conduct/{commission}/details/surveys/{event}','CommissionsConductController@survey_details');

	Route::get('admin/commissions_conduct/{commission}/details/tests/{event}/attempts/{attempt}','CommissionsConductController@test_attempt_details');
	Route::get('/admin/commissions_conduct/{commission}/details/surveys/{event}/{user}','CommissionsConductController@survey_user_details');

	Route::get('admin/commissions_conduct/{commission}/export/events/tests/{event}','CommissionsExportController@export_test_event');
	Route::get('admin/test_attempts/{attempt}/export','CommissionsExportController@export_test_attempt');

	



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