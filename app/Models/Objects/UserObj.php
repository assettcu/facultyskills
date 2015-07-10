<?php
/**
 * Created by PhpStorm.
 * User: carneymo
 * Date: 6/4/2015
 * Time: 11:32 AM
 */

namespace app\Models\Objects;

use App\Models\System\FactoryObj;

class UserObj extends FactoryObj {

    public function __construct($id=null) {
        parent::__construct("id","users",$id);
    }

}