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
        if (!empty($_POST[keys::$key_word]))
        {
            $url = $_POST[keys::$url];
            $query = "INSERT INTO `webpages`(`URL`, `TITLE`, `DESCRIPTION`, `TYPE`, `LIVE_DATE`, `UPDATE_DATE`, `S_TYPE`, `N_TYPE`, `KEY_WORD`) VALUES ('".addslashes($_POST[keys::$url])."','".addslashes($_POST[keys::$title])."','".addslashes(($_POST[keys::$description]))."','".addslashes($_POST[keys::$network_type])."','".date("Y/m/d")."','".date("Y/m/d")."','".addslashes($_POST[keys::$type])."','".addslashes($_POST[keys::$network_type])."','".addslashes($_POST[keys::$key_word])."')";
            DB::insert($query);
            echo DB::getPdo()->lastInsertId();
        }
        else
        {
            $url = $_POST[keys::$url];
            $query = "INSERT INTO `dlinks`(`URL`,`S_TYPE`, `N_TYPE`, `LIVE_DATE`, `UPDATE_DATE`, `WP_FK`) VALUES ('".$_POST[keys::$url]."','".$_POST[keys::$type]."','".$_POST[keys::$network_type]."','".date("Y/m/d")."','".date("Y/m/d")."','".$_POST[keys::$webpage_id]."')";
            DB::insert($query);
        }
    }

}
