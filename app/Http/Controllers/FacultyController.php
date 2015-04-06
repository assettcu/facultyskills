<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FacultyController extends Controller {

	/**
	 * Display a listing of all faculty members.
	 *
	 * @return View listing all faculty members
	 */
	public function index()
	{
		$faculty = \DB::table('staff')->get();
		return \View::make('faculty', array('faculty' => $faculty));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * View a specific faculty member
	 *
	 * @param  int  $id
	 * @return View of faculty member
	 */
	public function show($id)
	{
		// Get single faculty member by unique id
		$facultyMember = \DB::table('staff')->where('id', $id)->first();

		// Get all of the skills of the faculty member by id and add them to the faculty member object
		$skills = \DB::table('skills')->where('user_id', $facultyMember->id)->lists('skill');
		$facultyMember->skills = $skills;

		// Create view with fetched data
		return \View::make('facultymember', array('id' => $id, 'editing' => false, 'facultyMember' => $facultyMember));
	}

	/**
	 * Allow the editing of a faculty member's skills
	 *
	 * @param  int  $id
	 * @return View that allows editing
	 */
	public function edit($id)
	{
		// Get single faculty member by unique id
		$facultyMember = \DB::table('staff')->where('id', $id)->first();

		// Get all of the skills of the faculty member by id and add them to the faculty member object
		$skills = \DB::table('skills')->where('user_id', $facultyMember->id)->lists('skill');
		$facultyMember->skills = $skills;

		// Create view with fetched data
		return \View::make('facultymember', array('id' => $id, 'editing' => true, 'facultyMember' => $facultyMember));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
