<?php
class constant
{
    /*global.blade.php*/
    public static $logo = "images/logo.png";
    public static $image_icon = "images/img_download.png";
    public static $video_icon = "images/vid_download.png";
    public static $plus_icon = "images/plus.png";
    public static $doc_icon = "images/doc_download.png";
    public static $zero = 0;
    public static $emptyString = 0;

    /*torAlert.blade.php*/
    public static $tor_download_link = 'https://www.torproject.org/download/download-easy.html.en';
    public static $tor_header = 'TOR BROWSER NOT FOUND. CLICK HERE TO DOWNLOAD REQUIRED BROWSER';
    public static $tor_link = 'https://www.torproject.org/download/download-easy.html.en';
    public static $tor_body = 'Websites from dark web can only be accessed from torAlert proxy servers';

    /*search.blade*/
    public static $navigation_limit = 5;
    public static $pagination_limit = 15;
    public static $dlink_navigation_limit = 5;
    public static $dlink_pagination_limit = 35;
    public static $max_description_limit= 220;
    public static $search_icon= 'images/search.png';
    public static $search_base_url= 'http://localhost/BoogleSearch/public/search?';

    /*Notice Messages*/
    public static $notice_important = 'Important Notice';
    public static $notice_aboutus = 'About Us';
    public static $add_website_message_success = 'Your website has been added to our remote server. it will take 2 to 3 days to become live. make sure
        your webserver is up if the website is unreachable our server would try 3 times after that it will be removed
        from our database and you would have to add it again. Our server will automatically detect if its an image
        video or a website its title page and description  If you want to reach us for further information you can always contact us';


}
