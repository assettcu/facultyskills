<?php namespace App\Models\Objects;

use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model {

    protected $primaryKey = "username";
    protected $table = "fac_members";

	protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'title',
        'email',
        'office',
        'phone'
    ];

    public function skills()
    {
        return $this->hasMany('App\Models\Objects\FacultySkill', 'faculty_username');
    }

    public function technologies()
    {
        return $this->hasMany('App\Models\Objects\FacultyTechnology', 'faculty_username');
    }

}
