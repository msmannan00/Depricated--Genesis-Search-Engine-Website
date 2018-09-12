<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('searchpage.local_initialization')

<!--local php variables-->

<body>

<!--top bar-->
<div class="top-bar">
    <div class="top-bar__sub-container">
        <img src="{{constant::$logo}}" class="top-bar__logo disable-highlight" alt="" onclick="location.href='{{ url('') }}'" />
        <form class="top-bar__search-form" method="GET" action="search" enctype="multipart/form-data" onsubmit="return q.value!={{constant::$emptyString}}">

            <!--search box-->
            <input autocomplete="off" type="search" class="form-control top-bar__search-box" name="q" value="{{$query}}">
            <div class="top-bar__catagories-container">

                <!--change search type like image video audio-->
                <span id="catagory_all" ><a href="{{constant::$search_base_url,$query }}&p_num=1&s_type=all" class="{{$s_type['all']}} top-bar__catagories disable-highlight">All</a></span>
                <span id="catagory_images" ><a href="{{constant::$search_base_url,$query }}&p_num=1&s_type=image" class="{{$s_type['image']}} top-bar__catagories disable-highlight" style="margin-left: 10px">Images</a></span>
                <span id="catagory_video" ><a href="{{constant::$search_base_url,$query }}&p_num=1&s_type=video" class="{{$s_type['video']}} top-bar__catagories disable-highlight" >Videos</a></span>
                <span id="catagory_book" ><a href="{{constant::$search_base_url,$query }}&p_num=1&s_type=doc" class="{{$s_type['doc']}} top-bar__catagories disable-highlight">Docs</a></span>
                <span id="catagory_finance" ><a href="{{constant::$search_base_url,$query }}&p_num=1&s_type=finance" class="{{$s_type['finance']}} top-bar__catagories disable-highlight">Finance</a></span>
                <span id="catagory_news" ><a href="{{constant::$search_base_url,$query }}&p_num=1&s_type=news" class="{{$s_type['news']}} top-bar__catagories disable-highlight">News</a></span>

                <!--dropdown menu to change relay network-->
                <div class="drop-down disable-highlight">
                    <div class="drop-down__button">{{$n_type}}</div>
                    <div class="drop-down__content">
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=onion&s_type={{$s_type_selected}}" class="drop-down__item drop-down__top-item">Onion</a>
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=i2p&s_type={{$s_type_selected}}" class="drop-down__item">I2P</a>
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=freenet&s_type={{$s_type_selected}}" class="drop-down__item">Freenet</a>
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=global&s_type={{$s_type_selected}}" class="drop-down__bottom-item">Global</a>
                    </div>
                </div>

            </div>

            <!--search icon in search bar-->
            <div class="container top-bar__search-icon-container">
                <img class="top-bar__search-icon disable-highlight" src="{{constant::$search_icon}}" alt=""/>
            </div>
            <div class="container top-bar__search-button-container">
                <button class="top-bar__search-button disable-highlight" type="submit"></button>
            </div>
            <input autocomplete="off" type="hidden" name="p_num" value="1">
            <input autocomplete="off" type="hidden" name="s_type" value="{{$s_type_selected}}">
        </form>
    </div>

    <!--warning bar-->
    <div style="clear: left;"></div>
    <div style="border-bottom : 1px solid #efefef;background-color: #ffcc99;font-weight: bold;width: 100%;font-size: 14px;height:29px;padding-top: 2.5px;margin-bottom: 1000px;text-align: center;color: white">
        <p>We don't own any of the content. We are just showing their links so if you found something disturbing report to us</p>
    </div>

</div>

<!--result-->

@include($content_type)


<!--footer-->
@include('blades.footer')

</body>
</html>
