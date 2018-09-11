<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use constant;
use keys;

class tor_model extends Model
{
    public function getURL()
    {
        return $_GET[keys::$url];
    }

    public function getTitle()
    {
        return $_GET[keys::$title];
    }

    public function getDescription()
    {
        return $_GET[keys::$description];
    }

    public function getType()
    {
        return $_GET[keys::$type];
    }

    public function getLiveData()
    {
        return $_GET[keys::$live_date];
    }

    public function getUpdateData()
    {
        return $_GET[keys::$update_date];
    }


}
