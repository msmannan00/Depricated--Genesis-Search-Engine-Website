<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class search extends Controller
{
    public function getView()
    {
        return view('searchpage.search');
    }
}
