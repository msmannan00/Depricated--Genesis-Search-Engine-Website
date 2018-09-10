<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\search_model;

class search extends Controller
{

    var $search_model;

    public function getView()
    {
        return view('searchpage.search');
    }

    //RETURN REQUIRED VARIABLES TO POPULATE HTML FRONT END
    public function searchResult(Request $request)
    {
        $search_model = new search_model;
        $totalRows = $search_model->getTotalRows();

        return view('searchpage.search')
            ->with(config('constant.search_query_key'), $search_model->getSearchedQuery())
            ->with(config('constant.search_result_key'), $search_model->getSearchResult())
            ->with(config('constant.search_page_number'), $search_model->getPageNumber())
            ->with(config('constant.search_previous_page'), $search_model->getPreviousPage())
            ->with(config('constant.search_next_page'), $search_model->getNextPage())
            ->with(config('constant.search_network_type'), $search_model->getNetworkType())
            ->with(config('constant.search_nav_key'), $this->getNavBarIndex($totalRows))
            ->with(config('constant.search_result_count_key'), $totalRows);
    }

    //FUNCTION TO CALCULATE NAVIGATION INITIAL INDEX SO THAT WE CAN SHOW PREVOUS 2 INDEX IF CURRENT INDEX IS IN MIDDLE
    //AND NOT TO MOVE CURRENT INDEX IF AT STARTING AT END OF NAVIGATION BAR
    public function getNavBarIndex($totalURLFound)
    {
        $pageNumber = $_GET[config('constant.search_page_number_Key')]-1;
        $navigation_limit = config('constant.search_navigation_limit');
        $pagination_limit = config('constant.search_pagination_limit');
        $navDifference = $pageNumber - ceil(floatval($totalURLFound)/$pagination_limit);

        //IF CURRENT INDEX IS AT STARTING OR ENDING
        if(abs($navDifference-1) < $navigation_limit)
        {
            //MOVE CURRENT NAVIGATION INDEX WITHOUT SHOWING PREVIOUS INDEX
            $nav_index = $pageNumber - ($navigation_limit+$navDifference);
        }
        else
        {
            //CREATES SPACE FOR PREVIOUS 2 INDEX IF EXISTS AND NOT STARTING AND ENDING OF NAVIGATION
            $nav_index = max(0, $pageNumber-2);
        }

        return $nav_index;

    }

}
