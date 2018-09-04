<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\search_model;

class search extends Controller
{
    public function getView()
    {
        return view('searchpage.search');
    }

    public function searchResult(Request $request)
    {
        return view('searchpage.search')
            ->with(config('constant.search_model_key'), search_model::getSearchedQuery())
            ->with(config('constant.web_model_key'), search_model::getSearchResult());
    }

}
