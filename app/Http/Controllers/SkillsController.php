<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Skill;
use App\FacultyMember;
use Illuminate\Http\Request;

class SkillsController extends Controller {

	/**
	 * Add a new skill to a Faculty Member
	 *
	 * @parameter skillName Name of new skill to be added to user $id
	 * @return FacultyMember JSON Representation of FacultyMember
	 */
	public function store($id, Request $request)
	{
		$facultyMember = FacultyMember::findOrFail($id);
		$skill = new Skill();
		$skill->name = $request->input('skillName');
		$facultyMember->skills()->save($skill);

		return response()->json($facultyMember);
	}

	/**
	 * Remove a skill from a Faculty Member
	 *
	 * @return Response
	 */
	public function destroy($faculty_id, $skill_id)
	{
		$skill = FacultySkill::find($skill_id);

		// Check to make sure the skill belongs to the user
		if($skill->facultyMember->username == $faculty_id) {
            FacultySkill::destroy($skill_id);
			response()->json("success");
		}
		else {
			response()->json("Skill does not match user");
		}
	}

}
