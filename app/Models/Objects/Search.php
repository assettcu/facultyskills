<?php
namespace app\Models\Objects;

use DB;
use Illuminate\Database\Eloquent\Model;

class Search extends Model {

    protected $table = "searches";
    protected $fillable = [
        'search',
        'ipaddress'
    ];
}