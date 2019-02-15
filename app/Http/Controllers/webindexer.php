<?php

namespace App\Http\Controllers;

use App\webindexer_model;
use Illuminate\Http\Request;

class webindexer extends Controller
{
    public function __invoke(Request $request)
    {
    }

    /*get view of controller*/
    public function getView()
    {
        $webindexer_model = new webindexer_model();

        $webindexer_model->readDocument();
        //$webindexer_model->searchQuery("hello me me hwl hello me wow");

        return view('webindexer.webindexer');
    }
}
