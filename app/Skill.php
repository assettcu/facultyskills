<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

    protected $fillable = [
        'skill'
    ];

    public function facultyMember()
    {
        return $this->belongsTo('App\FacultyMember');
    }

}
