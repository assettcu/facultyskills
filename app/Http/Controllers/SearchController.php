<?php namespace App\Http\Controllers;

use DB;
use App\Models\Objects\FacultyMember;
use App\Models\Objects\Search;
use App\Models\Objects\FacultySkill;
use App\Models\Objects\FacultyTechnology;
use App\Models\System\StdLib;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SearchController extends Controller {

    public function index()
    {
        $q = $_REQUEST["q"];
        $terms = explode(" ",$q);

        $totalresults1 = [];
        $totalresults2 = [];
        $totalresults3 = [];

        foreach($terms as $term) {
            $term = trim($term);
            if(empty($term)) continue;

            # Names, Skills, Technologies, Departments
            $results1 = DB::table("fac_members")
                ->where("last_name","LIKE","%".$term."%")
                ->orWhere("first_name","LIKE","%".$term."%")
                ->orWhere("username","LIKE","%".$term."%")
                ->lists("username");

            $results2 = DB::table("fac_skills")
                ->join("fac_members","fac_members.username","=","fac_skills.faculty_username")
                ->where("name","LIKE","%".$term."%")
                ->groupBy("fac_members.username")
                ->lists("fac_members.username");

            $results3 = DB::table("fac_technologies")
                ->join("fac_members","fac_members.username","=","fac_technologies.faculty_username")
                ->where("name","LIKE","%".$term."%")
                ->groupBy("fac_members.username")
                ->lists("fac_members.username");

            $totalresults1 = $this->merge_results($totalresults1, $results1);
            $totalresults2 = $this->merge_results($totalresults2, $results2);
            $totalresults3 = $this->merge_results($totalresults3, $results3);
        }

        foreach($totalresults1 as $index => $id) {
            $totalresults1[$index] = FacultyMember::find($id);
        }
        foreach($totalresults2 as $index => $id) {
            $totalresults2[$index] = FacultyMember::find($id);
        }
        foreach($totalresults3 as $index => $id) {
            $totalresults3[$index] = FacultyMember::find($id);
        }

        $params = [
            "search_count"  => (count($totalresults1) + count($totalresults2) + count($totalresults3)),
            "search_text"   => $q,
            "faculty" => [
                "results"       => $totalresults1
            ],
            "skills" => [
                "results"       => $totalresults2
            ],
            "technologies" => [
                "results"       => $totalresults3
            ]
        ];

        $search = new Search();
        $search->search = $q;
        $search->ipaddress = $_SERVER["REMOTE_ADDR"];
        $search->num_results = 
        $search->save();

        // Create view with fetched data
        return view('search', $params);
    }

    private function merge_results($totalresults, $results) {
        if(!empty($totalresults) and !empty($results)) {
            $totalresults = array_intersect($results, $totalresults);
        }
        else if(empty($totalresults1) and !empty($results)) {
            $totalresults = $results;
        }
        return $totalresults;
    }
}
