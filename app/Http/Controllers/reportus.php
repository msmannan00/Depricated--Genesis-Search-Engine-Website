<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reportus_model;
use constant;
use keys;


class reportus extends Controller
{
    public function __invoke(Request $request)
    {
    }

    public function getView()
    {
        $reportus_model = new reportus_model;

        return view('reportus.reportus')
            ->with(keys::$notice, $reportus_model->getNoticeMessage())
            ->with(keys::$success, $reportus_model->getReportMessage());
    }
}
