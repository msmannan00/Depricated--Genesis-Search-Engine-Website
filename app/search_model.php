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
        $user_query =  $_GET[keys::$name];
        $user_query = str_replace(' ', '|', $user_query);

        $paginationOffset = $_GET[keys::$page_number] - 1;
        $user_query = str_replace("[","]",$user_query);
        $query_keyWord = '';
        if($search_type=='all')
        {
            $query_keyWord = '';
        }
        else
        {
            $query_keyWord = " (KEY_WORD REGEXP '".$search_type."' OR TITLE REGEXP '".$search_type."') AND";
        }

        $webindexer_model = new webindexer_model();
        $doc_id_list = $webindexer_model->searchQuery($user_query);
        $this->total_rows = sizeof(explode(",",$doc_id_list));
        $query = "SELECT * FROM webpages WHERE ID IN (".$doc_id_list.")";
        $result = DB::select($query);

        $is_tor = strpos($is_tor_browser, 'ozilla');
        foreach($result as $row)
        {
        	$url_decoded = urldecode ($row->URL );
            if(!$is_tor)
            {
                $data_row[keys::$redirection] = "tor_alert?url=".$row->URL."&title=".$row->TITLE
                    ."&desc=".str_replace("&","",$row->DESCRIPTION)
                    ."&s_type=".$row->TYPE."&live_date=".$row->LIVE_DATE."&update_date=".$row->UPDATE_DATE;
            }
            else
            {
                $data_row[keys::$redirection] = $url_decoded;
            }

            $title = $row->TITLE;
            if(strlen($title)<20)
            {
                    $title = $title." | ".substr($row->DESCRIPTION,0,200);
            }
            $description = $row->DESCRIPTION;
            if($description=="")
            {
                $description = "Description not found";
            }

            if($title=="")
            {
                $title = "Title not found";
            }

            $data_row[keys::$url] = $url_decoded;
            $data_row[keys::$id] = $row->ID;
            $data_row[keys::$title] = $title;
            $data_row[keys::$description] = $description;
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
        $user_query =  $_GET[keys::$name];

        $user_query = str_replace(' ', '|', $user_query);
        $user_query = str_replace("[","]",$user_query);
        $user_query = addslashes($user_query);

        $paginationOffset = $_GET[keys::$page_number] - 1;
        $query = "SELECT dlinks.*,webpages.TITLE as TITLE FROM dlinks,webpages WHERE dlinks.WP_FK = webpages.ID AND dlinks.S_TYPE= '".$search_type."' AND (webpages.TITLE REGEXP '".$user_query."' OR webpages.KEY_WORD REGEXP '".$user_query."') AND dlinks.N_TYPE='".Session::get(keys::$network_type)."'"." LIMIT ".constant::$dlink_pagination_limit." OFFSET ".$paginationOffset*constant::$dlink_pagination_limit;
        $result = DB::select($query);

        foreach($result as $row)
        {
            $data_row[keys::$dlink_url] = $row->URL;
            $title_length = strlen($row->URL);
            $title_wrapped = $row->TITLE;
            //if($title_length>20){
            //    $title_wrapped = substr($row->TITLE,$title_length-20,$title_length);
            //}
            //else{
            //    $title_wrapped = substr($row->TITLE,0,$title_length-4);
            //}
            $data_row[keys::$dlink_title] = $title_wrapped;
            $data_row[keys::$dlink_type] = $row->S_TYPE;
            $data_row[keys::$dlink_extension] = substr($row->URL,$title_length-3,$title_length);
            array_push($data_dlink,$data_row);
        }

        return $data_dlink;
    }

    /*GET LIST OF ALL WEBSITES DESPITE PAGINATION*/
    public function getTotalRows()
    {
        return $this->total_rows;
        $query_table = '';
        $query_keyWord = '';
        $search_type = $_GET[keys::$type];
        if (!empty($_GET[keys::$type])) {
            $link_type = $_GET[keys::$type];
            if($link_type=='all')
            {
                $query_table = db_constants::$webpages_tname;
                $query_keyWord = '(KEY_WORD REGEXP ? OR TITLE REGEXP ?) AND N_TYPE=';
            }
            else if($link_type=='finance' || $link_type=='news')
            {
                $query_table = db_constants::$webpages_tname;
                $query_keyWord = '(KEY_WORD REGEXP ? OR TITLE REGEXP ?) AND KEY_WORD LIKE "%'.$search_type.'%" AND N_TYPE=';
            }
            else
            {
                $query_table = db_constants::$webpages_tname.",".db_constants::$dlinks_tname;
                $query_keyWord = db_constants::$webpages_tname.".ID=".db_constants::$dlinks_tname.".WP_FK AND ".db_constants::$webpages_tname.".TITLE REGEXP ? AND ".db_constants::$dlinks_tname.'.S_TYPE="'.$search_type.'" AND '.db_constants::$dlinks_tname.".N_TYPE=";

            }
        }
        $user_query =  $_GET[keys::$name];
        $user_query = str_replace(' ', '|', $user_query);

        $user_query = str_replace("[","]",$user_query);
        $result = DB::select(DB::raw("SELECT count(*) as count FROM ".$query_table." WHERE ".$query_keyWord."'".Session::get(keys::$network_type)."'"),[addslashes($user_query),addslashes($user_query)]);
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
        else if($search_type=='video')
        {
            return constant::$video_icon;
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
