<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Objects\FacultyTechnology;
use App\Models\Objects\FacultyMember;
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
		$technology = new FacultyTechnology();
		$technology->name = $request->input('technologyName');

        if($facultyMember->technologies->contains($technology->name)) {
            return "failure";
        }

		$facultyMember->technologies()->save($technology);

		return redirect()->action('FacultyController@edit', $id)->with([
			'flash_message' => array('success' => 'Technology "' . $technology->name . '" successfully added.')
		]);
	}

	/**
	 * Remove a skill from a Faculty Member
	 *
	 * @return Response
	 */
	public function destroy($faculty_id, $technology_id)
	{
		$technology = FacultyTechnology::findOrFail($technology_id);

		// Check to make sure the skill belongs to the user
		if($technology->facultyMember->username == $faculty_id) {
			FacultyTechnology::destroy($technology_id);
		}

		return redirect()->action('FacultyController@edit', $faculty_id)->with([
			'flash_message' => array('success' => 'Technology "'.$technology->name. '" successfully removed.')
		]);
	}

}
