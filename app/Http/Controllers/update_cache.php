<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\update_cache_model;
use keys;
use constant;

class update_cache extends Controller
{
    public function getView()
    {
        $update_cache_model = new update_cache_model;
        $update_cache_model->updateCache();
        return "";
    }
}
