<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Skill;
use App\FacultyMember;
use Illuminate\Http\Request;

class SkillsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store($id, Request $request)
	{
		$facultyMember = FacultyMember::findOrFail($id);
		$skill = new Skill();
		$skill->name = $request->input('skillName');
		$facultyMember->skills()->save($skill);

		//session()->flash('flash-message','testing');

		return redirect()->action('FacultyController@edit', $id)->with([
			'flash_message' => array('success' => 'Skill "'.$skill->name. '" successfully added.')
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
	public function destroy($faculty_id, $skill_id)
	{
		$skill = Skill::find($skill_id);

		// Check to make sure the skill belongs to the user
		if($skill->facultyMember->id == $faculty_id) {
			Skill::destroy($skill_id);
		}
		else {

		}
		return redirect()->action('FacultyController@edit', $faculty_id)->with([
			'flash_message' => array('success' => 'Skill "'.$skill->name. '" successfully removed.')
		]);
	}

}
