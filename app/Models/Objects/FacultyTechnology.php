<?php namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class FacultyTechnology extends Model {

    protected $primaryKey = "id";
    protected $table = "fac_technologies";

    protected $fillable = [
        'name'
    ];

    public function facultyMember()
    {
        return $this->belongsTo('App\FacultyMember', 'faculty_username');
    }

    public static function getAllUnique()
    {
        return \DB::table('fac_technologies')
            ->select('name')
            ->groupBy('name')
            ->orderBy('name')
            ->get();
    }
}
