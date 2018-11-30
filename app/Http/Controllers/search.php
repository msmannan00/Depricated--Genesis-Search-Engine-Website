<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\search_model;
use constant;
use keys;

class search extends Controller
{

    //MODEL INITIALIZATION
    var $search_model;

    //RETURN REQUIRED VARIABLES TO POPULATE HTML FRONT END
    public function searchResult(Request $request)
    {
        $search_model = new search_model;
        $search_model->getNetworkType();
        $totalRows = $search_model->getTotalRows();

        return view('searchpage.search')
            ->with(keys::$query, $search_model->getSearchedQuery())
            ->with(keys::$result, $search_model->getSearchResult())
            ->with(keys::$page_number, $search_model->getPageNumber())
            ->with(keys::$previous_page, $search_model->getPreviousPage())
            ->with(keys::$next_page, $search_model->getNextPage())
            ->with(keys::$network_type, $search_model->getNetworkType())
            ->with(keys::$type, $search_model->getSearchType())
            ->with(keys::$type_selected, $search_model->getSearchTypeSelected())
            ->with(keys::$content_type, $search_model->getContentType())
            ->with(keys::$dlink, $search_model->getDLinkResult())
            ->with(keys::$nav, $this->getNavBarIndex($totalRows))
            ->with(keys::$dlink_icon, $search_model->getdlinkIcon())
            ->with(keys::$result_count, $totalRows);
    }

    //FUNCTION TO CALCULATE NAVIGATION INITIAL INDEX SO THAT WE CAN SHOW PREVOUS 2 INDEX IF CURRENT INDEX IS IN MIDDLE
    //AND NOT TO MOVE CURRENT INDEX IF AT STARTING AT END OF NAVIGATION BAR
    public function getNavBarIndex($totalURLFound)
    {
        $pageNumber = $_GET[keys::$page_number]-1;
        $search_type = $_GET[keys::$type];
        if($search_type=="image"||$search_type=="video"||$search_type=="doc")
        {
            $navDifference = $pageNumber - ceil(floatval($totalURLFound)/constant::$dlink_pagination_limit);
        }
        else
        {
            $navDifference = $pageNumber - ceil(floatval($totalURLFound)/constant::$pagination_limit);
        }

        //IF CURRENT INDEX IS AT STARTING OR ENDING
        if(abs($navDifference-1) < constant::$navigation_limit)
        {
            //MOVE CURRENT NAVIGATION INDEX WITHOUT SHOWING PREVIOUS INDEX
            $nav_index = $pageNumber - (constant::$navigation_limit+$navDifference);
        }
        else
        {
            //CREATES SPACE FOR PREVIOUS 2 INDEX IF EXISTS AND NOT STARTING AND ENDING OF NAVIGATION
            $nav_index = max(0, $pageNumber-2);
        }
        return $nav_index;
    }

}
