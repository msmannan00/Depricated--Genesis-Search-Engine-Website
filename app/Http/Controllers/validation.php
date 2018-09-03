<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\Config;
use phpDocumentor\Reflection\DocBlock\Tags\Param;

class validation extends Controller
{
    //FORM VALIDATIONS
    public function searchResult(Request $request)
    {
        $data=array(config('constant.query_key')=>$_GET[config('constant.query_name')]);
        return view('searchpage.search')->with(config('constant.query_var'), $data);
    }

}
