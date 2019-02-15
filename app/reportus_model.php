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
        $query = "INSERT INTO `report_web`(`URL`) VALUES (?)";
        $values = [$url];
        DB::insert($query, $values);
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
            return "Website Reported Successfully";
        }
        else
        {
            return constant::$emptyString;
        }
    }


}
