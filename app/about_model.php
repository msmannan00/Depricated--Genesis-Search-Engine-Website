<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use constant;
use keys;

class about_model extends Model
{
    public function getNoticeMessage()
    {
        return constant::$notice_important;
    }
}
