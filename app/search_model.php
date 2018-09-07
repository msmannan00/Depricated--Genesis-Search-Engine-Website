<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class search_model extends Model
{
    var $total_rows = 0;
    /*GET WEBSITES BASED ON SEARCHED QUERY AND PAGINATION*/
    public function getSearchResult()
    {
        $paginationLimit = config('constant.search_pagination_limit');
        $paginationOffset = $_GET[config('constant.search_page_number_Key')] - 1;
        $result = DB::select('SELECT * FROM webpages WHERE ID != 2 LIMIT '.$paginationLimit.' OFFSET '.$paginationOffset*$paginationLimit);

        $data = array();
        foreach($result as $row)
        {
            $data_row[config('constant.web_id_key')] = $row->ID;
            $data_row[config('constant.web_url_key')] = $row->URL;
            $data_row[config('constant.web_title_key')] = $row->TITLE;
            $data_row[config('constant.web_description_key')] = $row->DESCRIPTION;
            array_push($data,$data_row);
        }

        return $data;
    }

    /*GET LIST OF ALL WEBSITES DESPITE PAGINATION*/
    public function getTotalRows()
    {
        $result = DB::select('SELECT count(*) as count FROM webpages');
        $this->total_rows = $result[0]->count;
        return $result[0]->count;
    }

    /*EXTRACT CURRENT PAGE NUMBER FROM URL*/
    public function getPageNumber()
    {
        return $_GET[config('constant.search_page_number_Key')]-1;
    }


    /*EXTRACT SEARCHED QUERY FROM URL*/
    public function getSearchedQuery()
    {
        return $_GET[config('constant.search_name_key')];
    }

    public function getPreviousPage()
    {
        $page_number = $_GET[config('constant.search_page_number_Key')];
        if($page_number > 1)
        {
            $page_number -= 1;
        }
        return $page_number;
    }

    public function getNextPage()
    {
        $page_number = $_GET[config('constant.search_page_number_Key')];
        $pagination_limit = config('constant.search_pagination_limit');
        $max_nav = ceil(floatval($this->total_rows)/$pagination_limit);

        if($page_number < $max_nav)
        {
            $page_number += 1;
        }
        return $page_number;
    }

}
