<?php namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\FacultyMember;
use App\Expertise;

class APIController extends Controller {

	/*
	 * List of all the faculty.
	 * @return array
	 */
    public function ListOfFaculty()
    {
        $list = FacultyMember::all();
        return ['status'=>200, 'result'=> compact("list")];
    }

    /*
     * List of unique skills.
     * @return array
     */
    public function ListOfSkills()
    {
        # Todo: Make sure if a username is passed in, we return only that specific faculty's skills
        $params = Request::all();
        $list = FacultySkills::getAllUnique();
        return ['status'=>200, 'result'=> compact("list")];
    }

    /*
     * List of unique technologies.
     * @return array
     */
    public function ListOfTechnologies()
    {
        # Todo: Make sure if a username is passed in, we return only that specific faculty's technologies
        $params = Request::all();
        $list = FacultyTechnology::getAllUnique();
        return ['status'=>200, 'result'=> compact("list")];
    }

    /**
     * All faculty with a given skill.
     * @return array
     */
    public function FacultyWithSkill()
    {
        $params = Request::all();
        $list = [];
        return ['status'=>200, 'result'=> compact("list")];
    }

    /**
     * All faculty with a given technology.
     * @return array
     */
    public function FacultyWithTechnology()
    {
        $list = [];
        return ['status'=>200, 'result'=> compact("list")];
    }

    public function search()
    {
        # Generic search for Faculty, Skills, or Tech
    }

    public function similar()
    {
        # Search for Faculty with similar Skills or Tech
    }
}
