<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FacultyTechnology;
use App\FacultyMember;
use Illuminate\Http\Request;

class TechnologyController extends Controller {

	/**
	 * Add a new skill to a Faculty Member
	 *
	 * @parameter skillName Name of new skill to be added to user $id
	 * @return FacultyMember JSON Representation of FacultyMember
	 */
	public function store($id, Request $request)
	{
		$facultyMember = FacultyMember::findOrFail($id);
		$skill = new FacultyTechnology();
		$skill->name = $request->input('technologyName');
		$facultyMember->skills()->save($skill);

		return redirect()->action('FacultyController@edit', $id)->with([
			'flash_message' => array('success' => 'Technology "' . $skill->name . '" successfully added.')
		]);
	}

	/**
	 * Remove a skill from a Faculty Member
	 *
	 * @return Response
	 */
	public function destroy($faculty_id, $technology_id)
	{
		$skill = FacultyTechnology::findOrFail($technology_id);

		// Check to make sure the skill belongs to the user
		if($skill->facultyMember->username == $faculty_id) {
			FacultyTechnology::destroy($technology_id);
		}

		return redirect()->action('FacultyController@edit', $faculty_id)->with([
			'flash_message' => array('success' => 'Technology "'.$skill->name. '" successfully removed.')
		]);
	}

}
