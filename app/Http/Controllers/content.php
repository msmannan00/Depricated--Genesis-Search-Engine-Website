<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class content extends Controller
{
    public function getView()
    {
        return view('contentpage.contentpage');
    }

    public function searchResult(Request $request)
    {
        return view('contentpage.contentpage');
    }

    //FUNCTION TO CALCULATE NAVIGATION INITIAL INDEX SO THAT WE CAN SHOW PREVOUS 2 INDEX IF CURRENT INDEX IS IN MIDDLE
    //AND NOT TO MOVE CURRENT INDEX IF AT STARTING AT END OF NAVIGATION BAR
    public function getNavBarIndex($totalURLFound)
    {

    }

}
