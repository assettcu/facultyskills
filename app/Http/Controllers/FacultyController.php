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
		$faculty = \App\FacultyMember::all();
		//$faculty = \DB::table('staff')->get();
		return view('faculty', compact('faculty'));
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
		// Set editing to false
		$editing = false;

		// Get faculty member by id
		$facultyMember = \App\FacultyMember::find($id);

		// If faculty member exists, get their skills
		if($facultyMember)
			$facultyMember->skills = \App\FacultyMember::find($id)->skills;

		// Create view with fetched data
		return view('facultymember', compact('id', 'editing', 'facultyMember'));
	}

	/**
	 * Allow the editing of a faculty member's skills
	 *
	 * @param  int  $id
	 * @return View that allows editing
	 */
	public function edit($id)
	{
		// Set editing to false
		$editing = true;

		// Get faculty member by id
		$facultyMember = \App\FacultyMember::find($id);

		// If faculty member exists, get their skills
		if($facultyMember)
			$facultyMember->skills = \App\FacultyMember::find($id)->skills;

		// Create view with fetched data
		return view('facultymember', compact('id', 'editing', 'facultyMember'));
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
