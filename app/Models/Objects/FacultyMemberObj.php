<?php
namespace App\Models\Objects;

use DB;
use App\Models\System\FactoryObj;

class FacultyMemberObj extends FactoryObj {

    public $skills = [];
    public $technologies = [];

    public function __construct($username=null)
    {
        parent::__construct("username","fac_members",$username);
    }

    protected function post_load()
    {
        if($this->loaded) {
            $this->skills = $this->get_skills();
            $this->technologies = $this->get_technologies();
        }
    }

    public function get_skills() {
        return DB::table('fac_skills')
            ->where('faculty_username','=',$this->username)
            ->get();
    }

    public function get_technologies() {
        return DB::table('fac_technologies')
            ->where('faculty_username','=',$this->username)
            ->get();
    }

}