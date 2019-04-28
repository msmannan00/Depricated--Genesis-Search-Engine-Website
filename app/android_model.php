<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use keys;
use constant;
use DB;
use Session;

class android_model extends Model
{
    public function getDownloadURL()
    {
        return "https://apkpure.com/dead-target-offline-zombie-shooting-games/com.vng.g6.a.zombie";
    }

    public function getNoticeMessage()
    {
        return constant::$notice_download;
    }

}
