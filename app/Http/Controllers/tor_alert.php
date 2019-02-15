<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tor_alert_model;
use keys;

class tor_alert extends Controller
{
    var $tor_model;

    public function getView()
    {
        $tor_model = new tor_alert_model;
        return view('torpage.tor_alert')
            ->with(keys::$url, $tor_model->getURL())
            ->with(keys::$title, $tor_model->getTitle())
            ->with(keys::$description, $tor_model->getDescription())
            ->with(keys::$type, $tor_model->getType())
            ->with(keys::$live_date, $tor_model->getLiveData())
            ->with(keys::$notice, $tor_model->getNoticeMessage())
            ->with(keys::$update_date, $tor_model->getUpdateData());
    }

}
