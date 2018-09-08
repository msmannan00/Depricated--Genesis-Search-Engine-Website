<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tor_model;

class tor extends Controller
{
    var $tor_model;

    public function getView()
    {
        $tor_model = new tor_model;
        return view('torpage.tor_alert')
            ->with(config('constant.tor_url_key'), $tor_model->getURL())
            ->with(config('constant.tor_title_key'), $tor_model->getTitle())
            ->with(config('constant.tor_description_key'), $tor_model->getDescription())
            ->with(config('constant.tor_type_key'), $tor_model->getType())
            ->with(config('constant.tor_live_date_key'), $tor_model->getLiveData())
            ->with(config('constant.tor_update_date_key'), $tor_model->getUpdateData());
    }

}
