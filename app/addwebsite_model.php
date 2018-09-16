<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use keys;
use Session;

class addwebsite_model extends Model
{
    public function getURL()
    {
        return $_GET[keys::$url];
    }

    public function getTitle()
    {
        return "WEBSITE SUCCESSFULLY ADDED";
    }

    public function getDescription()
    {
        return "Your website has been added to our remote server. it will take 2 to 3 days to become live. make sure
        your webserver is up if the website is unreachable our server would try 3 times after that it will be removed
        from our database and you would have to add it again. Our server will automatically detect if its an image
        video or a website its title page and description  If you want to reach us for further information you can contact
        us with our information given below";
    }

    public function getType()
    {
        return Session::get(keys::$network_type);
    }

    public function getLiveData()
    {
        return "1 Sep 1992";
    }

    public function getUpdateData()
    {
        return "1 Sep 1992";
    }
}
