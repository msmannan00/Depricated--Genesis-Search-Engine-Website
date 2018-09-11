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
                <span id="catagory_all" ><a href="{{constant::$search_base_url,$query }}&p_num=1&ntype=Onion&s_type=all" class="{{$s_type['all']}} top-bar__catagories disable-highlight">All</a></span>
                <span id="catagory_images" ><a href="{{constant::$search_base_url,$query }}&p_num=1&ntype=Onion&s_type=images" class="{{$s_type['images']}} top-bar__catagories disable-highlight" style="margin-left: 10px">Images</a></span>
                <span id="catagory_video" ><a href="{{constant::$search_base_url,$query }}&p_num=1&ntype=Onion&s_type=videos" class="{{$s_type['videos']}} top-bar__catagories disable-highlight" >Videos</a></span>
                <span id="catagory_book" ><a href="{{constant::$search_base_url,$query }}&p_num=1&ntype=Onion&s_type=books" class="{{$s_type['books']}} top-bar__catagories disable-highlight">Books</a></span>
                <span id="catagory_finance" ><a href="{{constant::$search_base_url,$query }}&p_num=1&ntype=Onion&s_type=finance" class="{{$s_type['finance']}} top-bar__catagories disable-highlight">Finance</a></span>
                <span id="catagory_news" ><a href="{{constant::$search_base_url,$query }}&p_num=1&ntype=Onion&s_type=news" class="{{$s_type['news']}} top-bar__catagories disable-highlight">News</a></span>

                <!--dropdown menu to change relay network-->
                <div class="drop-down disable-highlight">
                    <div class="drop-down__button">{{$n_type}}</div>
                    <div class="drop-down__content">
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=Onion&s_type={{$s_type_selected}}" class="drop-down__item drop-down__top-item">Onion</a>
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=I2P&s_type={{$s_type_selected}}" class="drop-down__item">I2P</a>
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=Freenet&s_type={{$s_type_selected}}" class="drop-down__item">Freenet</a>
                        <a href="{{constant::$search_base_url,$query }}&p_num=1&n_type=Global&s_type={{$s_type_selected}}" class="drop-down__bottom-item">Global</a>
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
    <div style="clear: left;"></div>
</div>

<!--result-->
@include($content_type)


<!--footer-->
@include('blades.footer')

</body>
</html>
