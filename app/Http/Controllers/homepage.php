<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\analytic;

class homepage extends Controller
{
    public function __invoke(Request $request)
    {
    }

    /*get view of controller*/
    public function getView()
    {
        $this->sendAnalytics();
        return view('homepage.homepage');
    }
    
    public function sendAnalytics()
    {
        $analytic_m = new analytic;
        $analytic_m->log('homepage');
    }

}
