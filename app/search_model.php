<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;
use constant;
use db_constants;
use keys;
use App\SpellCorrect;

class search_model extends Model
{
    var $total_rows = 0;
    var $user_query = 0;
    var $user_query_original = "";
    var $user_query_suggested = "";
    var $seach_ids = "";
    var $typeSelector = "";
    var $countquery = "";

    public function initializeSpellCheck()
    {

        $this->user_query =  $_GET[keys::$name];

        $spchecker = new spellcheck("english.dic");
        $spchecker->buildIndex('english.dic', 'dict');
        $spell_dict = new spellcheck('dict');

        $this->user_query_suggested="".$spell_dict->checkSentence($this->user_query);
        //$this->user_query = $this->user_query_suggested;
        $this->user_query_original = $this->user_query;

        if(!$spell_dict->suggestion_made)
        {
            $this->user_query_suggested = constant::$emptyString;
        }

    }

    /*GET WEBSITES BASED ON SEARCHED QUERY AND PAGINATION*/
    public function getSearchResult()
    {


        $stype = $this->getSearchTypeSelected();
        if($stype!='image' && $stype!='video' && $stype!='doc')
        {
            $data = array();

            $this->user_query = $this->user_query_original;
            $limitlower = ($this->getPageNumber())*constant::$pagination_limit;
            $limitupper = ($this->getPageNumber()+1)*constant::$pagination_limit;
            $filter = '';
            if($stype!='all')
            {
                $this->typeSelector = "and stype='".$stype."'";
            }

            if(isset($_GET['savesearch']) && $_GET['savesearch']=='on')
            {
                //$filter = ' AND saverank!=1';
            }

            $s_query = addslashes($this->user_query);

            $result = DB::select(DB::raw("SELECT id,url,description,title, keyword,LEFT(url,POSITION('.onion' IN url)) as hosturl,SUBSTR(webpge.title,1,(10*CHAR_LENGTH(webpge.title))/100) as distitle, MATCH (webpge.title)  AGAINST (? IN NATURAL LANGUAGE MODE) AS title_relevance,MATCH (keyword)  AGAINST (? IN NATURAL LANGUAGE MODE) AS desc_relevance FROM webpages as webpge,(select url as disturl2,title as disttit2 from webpages GROUP BY disttit2) as distitle_join WHERE distitle_join.disttit2 = webpge.title and distitle_join.disturl2 = webpge.url and (MATCH (webpge.title) AGAINST (? IN NATURAL LANGUAGE MODE) + MATCH  (keyword) AGAINST (? IN NATURAL LANGUAGE MODE))>0.5  ".$filter.$this->typeSelector." GROUP BY hosturl,distitle ORDER BY ((title_relevance*15)+desc_relevance) DESC LIMIT ".constant::$pagination_limit." OFFSET ".$limitlower),[$s_query,$s_query,$s_query,$s_query]);

            foreach($result as $row)
            {
                $url_decoded = urldecode ($row->url );
                $data_row[keys::$redirection] = $url_decoded;
                $description = $row->description;
                $title = $row->title;

                if(strlen($title)<20){
                    $title = $title." | ".substr($description,0,200);
                }
                if(strlen($description)<=1){
                    $description = "Description not found";
                }
                if(strlen($title)<=1){
                    $title = "Title not found";
                }
                $this->seach_ids.=",'".$row->id."'";
                $data_row[keys::$url] = $url_decoded;
                $data_row[keys::$id] = $row->id;
                $data_row[keys::$title] = ucfirst($title);
                $data_row[keys::$description] = ucfirst($description);
                array_push($data,$data_row);
            }

            return $data;
        }
    }

    public function getContentID()
    {
        $search_type = $this->getSearchTypeSelected();
        if($this->total_rows>0 && ($search_type=="image" || $search_type=="video" || $search_type=="doc"))
        {
            return constant::$web_id_dlink;
        }
        else
        {
            return constant::$web_id_page;
        }

    }

    public function getCatagory($type)
    {
        $data = array();
        $result = DB::select(DB::raw("SELECT description,url FROM webpages WHERE stype = '".$type."' limit 3"));

        foreach($result as $row)
        {
            $url_decoded = urldecode ($row->url );
            $data_row[keys::$url] = $url_decoded;
            $data_row[keys::$description] = $row->description;
            array_push($data,$data_row);
        }

        return $data;
    }

    public function getDLinkResult()
    {
        $stype = $this->getSearchTypeSelected();
        $sql_query = "";
        $isDlink = true;
        $limitlower = ($this->getPageNumber())*constant::$pagination_limit;
        $limitupper = ($this->getPageNumber()+1)*constant::$dlink_pagination_limit;

        if($stype=='image' || $stype=='video' || $stype=='doc') {
            $sql_query = "SELECT dlnk.url,web.title FROM webpages web,dlinks dlnk WHERE web.id=dlnk.wp_fk and (keyword REGEXP ? OR description REGEXP ?) and dtype='".$stype."'LIMIT ".constant::$dlink_pagination_limit." OFFSET ".$limitlower;
        }
        else  if($this->seach_ids=="")
        {
            return "";
        }
        else
        {
            $this->seach_ids = substr($this->seach_ids,1);
            $sql_query = "SELECT url FROM dlinks WHERE wp_fk in (".$this->seach_ids.") LIMIT 5";
            $isDlink = false;
        }

        $this->user_query = $this->user_query_original;
        $this->user_query = preg_replace("/[^a-zA-Z ]/", "", $this->user_query);
        $this->user_query = $this->user_query;
        $data_dlink = array();
        $this->user_query = str_replace(' ', '|', $this->user_query);

        $result = DB::select(DB::raw($sql_query), [addslashes($this->user_query),addslashes($this->user_query)]);

        foreach ($result as $row) {
            $data_row[keys::$dlink_url] = $row->url;
            if($isDlink)
            {
                $title_wrapped = $row->title;
                $data_row[keys::$dlink_title] = $title_wrapped;
            }
            $data_row[keys::$dlink_extension] = "img";
            array_push($data_dlink, $data_row);
        }
        return $data_dlink;
    }

    public function getNavBarIndex()
    {
        return $this->getNavBar($this->getTotalRows());
    }

    /*GET LIST OF ALL WEBSITES DESPITE PAGINATION*/
    public function getTotalRows()
    {

        return 1000;
        $stype = $this->getSearchTypeSelected();

        if($this->total_rows == 0)
        {
            if($stype=='image' || $stype=='video' || $stype=='doc')
            {
                $result = DB::select(DB::raw("SELECT COUNT(*) as count FROM webpages web,dlinks dlnk WHERE web.id=dlnk.wp_fk and (keyword REGEXP ? OR description REGEXP ?) and dtype='".$stype."'"),[addslashes($this->user_query),addslashes($this->user_query)]);
                $this->total_rows = $result[0]->count;
                return $this->total_rows;
            }
            else
            {
                $localtype = "";
                if($this->typeSelector=="")
                {
                    $localtype = " WHERE";
                }
                else
                {
                    $localtype = $this->typeSelector . " AND ";
                }

                $result = DB::select(DB::raw("SELECT COUNT(DISTINCT(title)) as count FROM webpages ".$localtype." (MATCH(keyword) AGAINST('".$this->user_query."' IN NATURAL LANGUAGE MODE) + MATCH(title) AGAINST('".$this->user_query."' IN NATURAL LANGUAGE MODE))>0.5"));

                $this->total_rows = $result[0]->count;
                return $this->total_rows;
            }
        }
        else
        {
            return $this->total_rows;
        }
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

    public function getSuggestedQuery()
    {
        return ltrim($this->user_query_suggested);
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

    //FUNCTION TO CALCULATE NAVIGATION INITIAL INDEX SO THAT WE CAN SHOW PREVOUS 2 INDEX IF CURRENT INDEX IS IN MIDDLE
    //AND NOT TO MOVE CURRENT INDEX IF AT STARTING AT END OF NAVIGATION BAR
    public function getNavBar($totalURLFound)
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

    public function getNoticeMessage()
    {
        return constant::$notice_header;
    }

}
