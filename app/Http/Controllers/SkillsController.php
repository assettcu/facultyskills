<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Objects\FacultySkill;
use App\Models\Objects\FacultyMember;
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
		$skill = new FacultySkill();
		$skill->name = $request->input('skillName');

		if($facultyMember->skills->contains($skill->name)) {
			return "failure";
		}

		$facultyMember->skills()->save($skill);

		return redirect()->action('FacultyController@edit', $id)->with([
			'flash_message' => array('success' => 'Skill "' . $skill->name . '" successfully added.')
		]);
	}

	/**
	 * Remove a skill from a Faculty Member
	 *
	 * @return Response
	 */
	public function destroy($faculty_id, $skill_id)
	{
		$skill = FacultySkill::findOrFail($skill_id);

		// Check to make sure the skill belongs to the user
		if($skill->facultyMember->username == $faculty_id) {
            FacultySkill::destroy($skill_id);
		}

		return redirect()->action('FacultyController@edit', $faculty_id)->with([
			'flash_message' => array('success' => 'Skill "'.$skill->name. '" successfully removed.')
		]);
	}

}
