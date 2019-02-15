<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use keys;

class create_website extends Controller
{
    public function __invoke(Request $request)
    {
    }

    /*get view of controller*/
    public function getView()
    {
        return view('createwebsite.create_website')
            ->with(keys::$notice, "Add Your Website")
            ->with(keys::$success, "Add Your Website");

    }
}
