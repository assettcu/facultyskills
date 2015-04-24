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

Route::get('/', function() {
    return redirect('/faculty');
});

# API Routes
Route::group(['prefix' => 'api/v1', 'after' => 'allowOrigin'], function()
{
    Route::get('facultylist','APIController@ListOfFaculty');
    Route::get('skillslist','APIController@ListOfSkills');
    Route::get('techlist','APIController@ListOfTechnologies');
    Route::get('facultywithskill','APIController@FacultyWithSkill');
    Route::get('facultywithtech','APIController@FacultyWithTechnology');
    Route::get('search','APIController@search');
    Route::get('similar','APIController@similar');
});

Route::resource('faculty', 'FacultyController', ['except' => ['create', 'destroy']]);

Route::post('faculty/{user_id}/skill', 'SkillsController@store');
Route::delete('faculty/{user_id}/skill/{skill_id}', 'SkillsController@destroy');

Route::post('faculty/{user_id}/technology', 'TechnologyController@store');
Route::delete('faculty/{user_id}/technology/{technology_id}', 'TechnologyController@destroy');



