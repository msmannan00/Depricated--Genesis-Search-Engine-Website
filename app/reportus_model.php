<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use keys;
use constant;
use DB;
use Session;

class reportus_model extends Model
{
    public function addReportedWebsite()
    {
        $url = $_GET[keys::$report];
        $query = "INSERT INTO `report_web`(`URL`, `DATE`) VALUES ('".$url."', '".date("Y/m/d")."')";
        DB::insert($query);
    }

    public function getNoticeMessage()
    {
        return constant::$notice_important;
    }

    public function getReportMessage()
    {
        if(!empty($_GET[keys::$report]))
        {
            $this->addReportedWebsite();
            return "Your website has been reported successfully";
        }
        else
        {
            return constant::$emptyString;
        }
    }


}
