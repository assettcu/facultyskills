<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\FacultyMember;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FacultyController extends Controller {

	/**
	 * Display a listing of all faculty members.
	 *
	 * @return FacultyMembers JSON representation of list of all FacultyMembers
	 */
	public function index()
	{
		$faculty = FacultyMember::all();
		return response()->json($faculty);
	}

	/**
	 * Create a new faculty member
	 *
	 * @parameter 	name 			Faculty Member's Name
	 *
	 * @return 		FacultyMember 	JSON representation of Newly Created FacultyMember
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$result = FacultyMember::create($input);

		return response()->json($result);
	}

	/**
	 * View a specific faculty member
	 *
	 * @param  int  $id
	 * @return View of faculty member
	 */
	public function show($id)
	{
		// Get faculty member by id
		$facultyMember = FacultyMember::findOrFail($id);

		// Fetch Faculty Member's skills
		$facultyMember->skills;

		return response()->json($facultyMember);
	}

	/**
	 * Update the faculty member
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$facultyMember = Facultymember::findOrFail($id);
		$facultyMember->update($request->all());

		return response()->json($facultyMember);
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
