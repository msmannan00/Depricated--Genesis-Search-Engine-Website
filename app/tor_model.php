<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tor_model extends Model
{
    public function getURL()
    {
        return $_GET[config('constant.tor_url_key')];
    }

    public function getTitle()
    {
        return $_GET[config('constant.tor_title_key')];
    }

    public function getDescription()
    {
        return $_GET[config('constant.tor_description_key')];
    }

    public function getType()
    {
        return $_GET[config('constant.tor_type_key')];
    }

    public function getLiveData()
    {
        return $_GET[config('constant.tor_live_date_key')];
    }

    public function getUpdateData()
    {
        return $_GET[config('constant.tor_update_date_key')];
    }


}
