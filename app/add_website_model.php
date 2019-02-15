<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use keys;
use DB;
use Session;
use constant;
use db_constants;

class add_website_model extends Model
{
    public function addURL()
    {
        $url = $_GET[keys::$url];
        $query = "INSERT IGNORE INTO `newpages`(`URL`) VALUES (?)";
        $values = [$url];
        DB::insert($query, $values);
    }

    public function getURL()
    {
        return $_GET[keys::$url];
    }

    public function getURLHome()
    {
        return parse_url($_GET[keys::$url], PHP_URL_HOST);;
    }

    public function getTitle()
    {
        return "WEBSITE ADDED IN OUR DATABASE";
    }

    public function getDescription()
    {
        return constant::$add_website_message_success;
    }

    public function getType()
    {
        return Session::get(keys::$network_type);
    }

    public function getLiveData()
    {
        return "1 Sep 1992";
    }

    public function getUpdateData()
    {
        return "1 Sep 1992";
    }

    public function getNoticeMessage()
    {
        return constant::$notice_important;
    }
}
