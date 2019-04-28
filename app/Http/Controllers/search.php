<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\analytic;
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
        $this->sendAnalytics();
        
        $search_model = new search_model;
        $search_model->initializeSpellCheck();

        return view('searchpage.search')
            ->with(keys::$query, $search_model->getSearchedQuery())
            ->with(keys::$result, $search_model->getSearchResult())
            ->with(keys::$page_number, $search_model->getPageNumber())
            ->with(keys::$notice, $search_model->getNoticeMessage())
            ->with(keys::$previous_page, $search_model->getPreviousPage())
            ->with(keys::$next_page, $search_model->getNextPage())
            ->with(keys::$network_type, $search_model->getNetworkType())
            ->with(keys::$type, $search_model->getSearchType())
            ->with(keys::$type_selected, $search_model->getSearchTypeSelected())
            ->with(keys::$content_type, $search_model->getContentType())
            ->with(keys::$dlink, $search_model->getDLinkResult())
            ->with(keys::$nav, $search_model->getNavBarIndex())
            ->with(keys::$dlink_icon, $search_model->getdlinkIcon())
            ->with(keys::$result_count, $search_model->getTotalRows())
            ->with(keys::$news_extras, $search_model->getCatagory(constant::$news_text))
            ->with(keys::$finance_extras, $search_model->getCatagory(constant::$finance_text))
            ->with(keys::$content_id, $search_model->getContentID())
            ->with(keys::$query_hint, $search_model->getSuggestedQuery());
    }

    public function sendAnalytics()
    {
        $analytic_m = new analytic;
        $analytic_m->log('searchpage');
    }

}
