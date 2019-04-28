<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use constant;
use keys;
use DB;

class analytic extends Model
{
    public function log($page)
    {
            $query = "UPDATE `analytic` SET hits = hits + 1  WHERE page = '".$page."'";
            DB::update($query);
    }

}
