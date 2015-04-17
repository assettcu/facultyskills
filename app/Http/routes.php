<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::resource('faculty', 'FacultyController', ['except' => ['create', 'edit', 'destroy']]);

Route::post('faculty/{user_id}/skill', 'SkillsController@store');
Route::delete('faculty/{user_id}/skill/{skill_id}', 'SkillsController@destroy');

//Route::get('faculty', 'FacultyController@index');
//Route::get('faculty/{id}', 'FacultyController@show');
//Route::get('faculty/{id}/edit', 'FacultyController@edit');
//Route::post('faculty/{id}', 'FacultyController@update');
