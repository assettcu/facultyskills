<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultySkill extends Model {

    protected $primaryKey = "id";
    protected $table = "fac_skills";

    protected $fillable = [
        'name'
    ];

    public function facultyMember()
    {
        return $this->belongsTo('App\FacultyMember', 'faculty_username');
    }

    public static function getAllUnique()
    {
        return \DB::table('fac_skills')
        ->select('name')
        ->groupBy('name')
        ->orderBy('name')
        ->get();
    }

}
