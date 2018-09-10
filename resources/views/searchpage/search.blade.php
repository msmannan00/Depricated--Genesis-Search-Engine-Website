<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('searchpage.local_initialization')

<!--local php variables-->
@php
    $navigation_limit = config('constant.search_navigation_limit');
@endphp

<body>

<!--top bar-->
<div class="top-bar">
    <div class="top-bar__sub-container">
        <img src="images/logo.png" class="top-bar__logo disable-highlight" alt="" onclick="location.href='{{ url('') }}'" />
        <form class="top-bar__search-form" method="GET" action="search" enctype="multipart/form-data" onsubmit="return q.value!=''">
            <input autocomplete="off" type="search" class="form-control top-bar__search-box" name="q" value="{{$query}}">
            <div class="top-bar__catagories-container">
                <span id="catagory_all" ><a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Onion&stype=all" class="{{$stype['all']}} top-bar__catagories disable-highlight">All</a></span>
                <span id="catagory_images" ><a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Onion&stype=images" class="{{$stype['images']}} top-bar__catagories disable-highlight" style="margin-left: 10px">Images</a></span>
                <span id="catagory_video" ><a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Onion&stype=videos" class="{{$stype['videos']}} top-bar__catagories disable-highlight" >Videos</a></span>
                <span id="catagory_book" ><a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Onion&stype=books" class="{{$stype['books']}} top-bar__catagories disable-highlight">Books</a></span>
                <span id="catagory_finance" ><a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Onion&stype=finance" class="{{$stype['finance']}} top-bar__catagories disable-highlight">Finance</a></span>
                <span id="catagory_news" ><a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Onion&stype=news" class="{{$stype['news']}} top-bar__catagories disable-highlight">News</a></span>

                <div class="drop-down disable-highlight">
                    <div class="drop-down__button">{{$network_type}}</div>
                    <div class="drop-down__content">
                        <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Onion" class="drop-down__item drop-down__top-item">Onion</a>
                        <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=I2P" class="drop-down__item">I2P</a>
                        <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Freenet" class="drop-down__item">Freenet</a>
                        <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page=1&ntype=Global" class="drop-down__bottom-item">Global</a>
                    </div>
                </div>

            </div>

            <div class="container top-bar__search-icon-container">
                <img class="top-bar__search-icon disable-highlight" src="images/search.png" alt=""/>
            </div>
            <div class="container top-bar__search-button-container">
                <button class="top-bar__search-button disable-highlight" type="submit"></button>
            </div>
            <input autocomplete="off" type="hidden" name="page" value="1">
        </form>
    </div>
    <div style="clear: left;"></div>
</div>

<!--result-->
@if($stype['all']=='active'||$stype['finance']=='active'||$stype['news']=='active')
    @include('searchpage.webpages.webpages')
@else
    @include('searchpage.contentpage.contentpage')
@endif


<!--footer-->
@include('blades.footer')

</body>
</html>
