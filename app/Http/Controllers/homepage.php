<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepage extends Controller
{
    public function __invoke(Request $request)
    {
    }

    /*get view of controller*/
    public function getView()
    {
        return view('homepage.homepage');
    }

}
