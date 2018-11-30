<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use keys;
use constant;
use DB;

class update_cache_model extends Model
{
    public function updateCache()
    {
        if (!empty($_GET[keys::$key_word]))
        {
            $url = $_GET[keys::$url];
            $query = "INSERT INTO `webpages`(`URL`, `TITLE`, `DESCRIPTION`, `TYPE`, `LIVE_DATE`, `UPDATE_DATE`, `S_TYPE`, `N_TYPE`, `KEY_WORD`) VALUES ('".$_GET[keys::$url]."','".$_GET[keys::$title]."','".$_GET[keys::$description]."','".$_GET[keys::$network_type]."','".date("Y/m/d")."','".date("Y/m/d")."','".$_GET[keys::$type]."','".$_GET[keys::$network_type]."','".$_GET[keys::$key_word]."')";
            DB::insert($query);
            echo DB::getPdo()->lastInsertId();
        }
        else
        {
            $url = $_GET[keys::$url];
            $query = "INSERT INTO `dlinks`(`URL`,`S_TYPE`, `N_TYPE`, `LIVE_DATE`, `UPDATE_DATE`, `WP_FK`) VALUES ('".$_GET[keys::$url]."','".$_GET[keys::$type]."','".$_GET[keys::$network_type]."','".date("Y/m/d")."','".date("Y/m/d")."','".$_GET[keys::$webpage_id]."')";
            DB::insert($query);
        }
    }

}
