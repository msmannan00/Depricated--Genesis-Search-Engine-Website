<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\about_model;
use keys;

class about extends Controller
{
    public function __invoke(Request $request)
    {
    }

    /*get view of controller*/
    public function getView()
    {
        $about_model = new about_model;
        return view('about.about')
        ->with(keys::$notice, $about_model->getNoticeMessage());
    }

}
