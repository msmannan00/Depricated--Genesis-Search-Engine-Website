<form class="sb_detail-header__search-form"  method="GET" action="search" enctype="multipart/form-data" onsubmit="return q.value!={{constant::$emptyString}}">

    <!--search box-->
    <div class="form-control sb_detail-header__search-box" >
        <input autocomplete="off" type="search" class="sb_detail-header__search-input" name="q" value="{{$query}}">
        <button class="sb_detail-header__search-button disable-highlight" type="submit"><img class="sb_detail-header__search-icon disable-highlight" src="{{constant::$search_icon}}" alt=""/></button>
    </div>

    <div class="sb_detail-header__catagories-container">
        <div class="container-outer">
            <div class="container-inner" >
                <div style="height: 35px;color: #1A73E8;width: 80%;pointer-events: auto">
                    <!--change search type like image video audio-->
                    <span id="catagory_all" ><a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&s_type=all" class="{{$s_type['all']}} sb_detail-header__catagories sb_detail-header__margin-left disable-highlight">All</a></span>
                    <span id="catagory_images" ><a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&s_type=image" class="{{$s_type['image']}} sb_detail-header__catagories sb_detail-header__catagories--margin-left disable-highlight" style="margin-left: 10px">Images</a></span>
                    <span id="catagory_video" ><a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&s_type=video" class="{{$s_type['video']}} sb_detail-header__catagories sb_detail-header__catagories--margin-left disable-highlight" >Videos</a></span>
                    <span id="catagory_book" ><a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&s_type=doc" class="{{$s_type['doc']}} sb_detail-header__catagories sb_detail-header__catagories--margin-left disable-highlight">Docs</a></span>
                    <span id="catagory_finance" ><a href="{{constant::$search_base_url}}q={{$query}}&p_num=1&s_type=finance" class="{{$s_type['finance']}} sb_detail-header__catagories sb_detail-header__catagories--margin-left disable-highlight">Finance</a></span>
                    <span id="catagory_news" ><a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&s_type=news" class="{{$s_type['news']}} sb_detail-header__catagories sb_detail-header__catagories--margin-left disable-highlight sb_detail-header__catagories--margin-right">News</a></span>
                    <!--dropdown menu to change relay network-->
                    <input autocomplete="off" type="hidden" name="p_num" value="1">
                    <input autocomplete="off" type="hidden" name="s_type" value="{{$s_type_selected}}">
                    @include('searchpage.blades.header_catagory')
                </div>
            </div>
        </div>
        <div class="submenus">
            <form method="GET" style="width: 100%;height:100%;"  class="hc_drop-down--form" action="search" enctype="multipart/form-data" onsubmit="return web.value!={{constant::$emptyString}}">
                <div style="float: left;margin-top: 0px;width: 25%;height: 100%;">
                    <input type="button"  onclick="window.location='{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=onion&s_type={{$s_type_selected}}'" class="hc_drop-down__item" style="@if($n_type == 'onion') background-color: #495057;color: white @endif" value="Onion"/>
                </div>
                <div style="float: left;margin-top: 0px;width: 25%;height: 100%">
                    <input type="button"  onclick="window.location='{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=i2p&s_type={{$s_type_selected}}'" class="hc_drop-down__item" style="@if($n_type == 'i2p') background-color: #495057;color: white @endif;margin-left: -1px" value="I2P"/>
                </div>
                <div style="float: left;margin-top: 0px;width: 25%;height: 100%">
                    <input type="button"  onclick="window.location='{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=freenet&s_type={{$s_type_selected}}'" class="hc_drop-down__item" style="@if($n_type == 'freenet') background-color: #495057;color: white @endif;margin-left: -2px" value="Freenet"/>
                </div>
                <div style="float: left;margin-top: 0px;width: 25%;height: 100%">
                    <input type="button"  onclick="window.location='{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=global&s_type={{$s_type_selected}}'" class="hc_drop-down__item" style="@if($n_type == 'global') background-color: #495057;color: white @endif;margin-left: -3px" value="Global"/>
                </div>
                <input autocomplete="off" type="hidden" name="p_num" value="1">
                <input autocomplete="off" type="hidden" name="s_type" value="{{$s_type_selected}}">
            </form>
        </div>
    </div>
</form>


