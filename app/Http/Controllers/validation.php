<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;

class validation extends Controller
{
    //FORM VALIDATIONS
    public function searchResult(Request $request)
    {
        return view('searchpage.search');
    }

}
