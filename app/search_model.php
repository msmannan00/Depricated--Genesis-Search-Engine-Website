<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class search_model extends Model
{
    public static function getSearchResult()
    {
        $result = DB::select('select * from webpages');
        $data = array();
        foreach($result as $row)
        {
            $data_row[config('constant.web_url_key')] = $row->URL;
            $data_row[config('constant.web_title_key')] = $row->TITLE;
            $data_row[config('constant.web_description_key')] = $row->DESCRIPTION;
            array_push($data,$data_row);
        }

        return $data;
    }

    public static function getSearchedQuery()
    {
        $data=array(config('constant.search_query_key')=>$_GET[config('constant.search_name_key')]);
        return $data;
    }

}
