<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use constant;
use db_constants;
use keys;


class search_model extends Model
{
    var $total_rows = 0;
    /*GET WEBSITES BASED ON SEARCHED QUERY AND PAGINATION*/
    public function getSearchResult()
    {
        $search_type = $_GET[keys::$type];
        $data = array();
        $is_tor_browser =  $_SERVER['HTTP_USER_AGENT'];
        $paginationOffset = $_GET[keys::$page_number] - 1;
        $result = DB::select("SELECT * FROM webpages WHERE S_TYPE = '".$search_type."' AND N_TYPE='".Session::get(keys::$network_type)."' LIMIT ".constant::$pagination_limit." OFFSET ".$paginationOffset*constant::$pagination_limit);

        foreach($result as $row)
        {
            if(strpos($is_tor_browser, 'tor') == false)
            {
                $data_row[keys::$redirection] = "tor_alert?url=".$row->URL."&title=".$row->TITLE
                    ."&desc=".str_replace("&","",$row->DESCRIPTION)
                    ."&s_type=".$row->TYPE."&live_date=".$row->LIVE_DATE."&update_date=".$row->UPDATE_DATE;
            }
            else
            {
                $data_row[keys::$redirection] = $row->URL;
            }

            $data_row[keys::$url] = $row->URL;
            $data_row[keys::$id] = $row->ID;
            $data_row[keys::$title] = $row->TITLE;
            $data_row[keys::$description] = $row->DESCRIPTION;
            $data_row[keys::$type] = $row->TYPE;
            $data_row[keys::$live_date] = $row->LIVE_DATE;
            $data_row[keys::$update_date] = $row->UPDATE_DATE;
            array_push($data,$data_row);
        }

        return $data;
    }

    public function getDLinkResult()
    {
        $search_type = $_GET[keys::$type];
        $data_dlink = array();
        $is_tor_browser =  $_SERVER['HTTP_USER_AGENT'];
        $paginationOffset = $_GET[keys::$page_number] - 1;

        $query = "SELECT * FROM dlinks WHERE S_TYPE= '".$search_type."' AND N_TYPE='".Session::get(keys::$network_type)."'";
        $result = DB::select($query);

        foreach($result as $row)
        {
            $data_row[keys::$dlink_url] = $row->URL;
            $title_length = strlen($row->TITLE);
            if($title_length>20){
                $data_row[keys::$dlink_title] = substr($row->TITLE,$title_length-20,$title_length);
            }
            else{
                $data_row[keys::$dlink_title] = $row->TITLE;
            }
            $data_row[keys::$dlink_type] = $row->S_TYPE;
            array_push($data_dlink,$data_row);
        }

        return $data_dlink;
    }

    /*GET LIST OF ALL WEBSITES DESPITE PAGINATION*/
    public function getTotalRows()
    {
        $query_table = '';
        if (!empty($_GET[keys::$type])) {
            $link_type = $_GET[keys::$type];
            if($link_type!='all'&&$link_type!='finance'&&$link_type!='news')
            {
                $query_table = db_constants::$dlinks_tname;
            }
            else
            {
                $query_table = db_constants::$webpages_tname;
            }
        }

        $search_type = $_GET[keys::$type];
        $result = DB::select("SELECT count(*) as count FROM ".$query_table." WHERE S_TYPE = '".$search_type."' AND N_TYPE='".Session::get(keys::$network_type)."'");
        $this->total_rows = $result[0]->count;
        return $result[0]->count;
    }

    /*EXTRACT CURRENT PAGE NUMBER FROM URL*/
    public function getPageNumber()
    {
        return $_GET[keys::$page_number]-1;
    }


    /*EXTRACT SEARCHED QUERY FROM URL*/
    public function getSearchedQuery()
    {
        return $_GET[keys::$name];
    }

    public function getPreviousPage()
    {
        $page_number = $_GET[keys::$page_number];
        if($page_number > 1)
        {
            $page_number -= 1;
        }
        return $page_number;
    }

    public function getNextPage()
    {
        $page_number = $_GET[keys::$page_number];
        $max_nav = ceil(floatval($this->total_rows)/constant::$pagination_limit);

        if($page_number < $max_nav)
        {
            $page_number += 1;
        }
        return $page_number;
    }

    public function getNetworkType()
    {
        if (!empty($_GET[keys::$network_type])) {
            Session::put(keys::$network_type, $_GET[keys::$network_type]);
        }
        else if(empty(Session::get(keys::$network_type)))
        {
            Session::put(keys::$network_type, 'onion');
        }
        return Session::get(keys::$network_type);
    }

    public function getSearchTypeSelected()
    {
        if (!empty($_GET[keys::$type]))
        {
            return $_GET[keys::$type];
        }
        else
        {
            return 'all';
        }
    }

    public function getContentType()
    {
        if (!empty($_GET[keys::$type])) {
            $link_type = $_GET[keys::$type];
            if($link_type!='all'&&$link_type!='finance'&&$link_type!='news')
            {
                return 'searchpage.dlinks.dlinks';
            }
            else
            {
                return 'searchpage.webpages.webpages';
            }
        }
    }

    public function getdlinkIcon()
    {
        $search_type = $_GET[keys::$type];
        if($search_type=='image')
        {
            return constant::$image_icon;
        }
        else
        {
            return constant::$doc_icon;
        }
    }

    public function getSearchType()
    {
        $data['all'] = '';
        $data['image'] = '';
        $data['video'] = '';
        $data['doc'] = '';
        $data['finance'] = '';
        $data['news'] = '';

        if (!empty($_GET[keys::$type])) {
            $data[$_GET[keys::$type]] = 'active';
        }
        else
        {
            $data['all'] = 'active';
        }
        return $data;
    }

}
