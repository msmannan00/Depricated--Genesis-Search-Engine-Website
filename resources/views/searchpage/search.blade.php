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
            <p class="top-bar__catagories-container">
                <span class="top-bar__catagories active" id="catagory_all" onMouseDown="search_manager.onCatagorySelected('catagory_all')">All</span>
                <span class="top-bar__catagories disable-highlight" id="catagory_images" onMouseDown="search_manager.onCatagorySelected('catagory_images')">Images</span>
                <span class="top-bar__catagories disable-highlight" id="catagory_video" onMouseDown="search_manager.onCatagorySelected('catagory_video')">Videos</span>
                <span class="top-bar__catagories disable-highlight" id="catagory_book" onMouseDown="search_manager.onCatagorySelected('catagory_book')">Books</span>
                <span class="top-bar__catagories disable-highlight" id="catagory_finance" onMouseDown="search_manager.onCatagorySelected('catagory_finance')">Finance</span>
                <span class="top-bar__catagories disable-highlight" id="catagory_news" onMouseDown="search_manager.onCatagorySelected('catagory_news')">News</span>
            </p>

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

<!--result-url-->
<div class="result-url">
    <p class="result-status">About {{$result_count}} results found</p>

    @foreach($result as $rows)
        @php
            $searchQueryTitle = $rows[config('constant.web_title_key')];
            $searchQueryUrl = $rows[config('constant.web_url_key')];
            $searchQueryDescription = $rows[config('constant.web_description_key')];
        @endphp
        <div class="result-url__header-spacing-top"><a href="{{ $searchQueryUrl }}" class="result-url__header disable-highlight">{{ $searchQueryTitle }}</a></div>
        <p class="result-url__link disable-highlight">{{ $searchQueryUrl }}</p>
        <p class="result-url__description disable-highlight">{{ $searchQueryDescription }}</p>
    @endforeach
</div>

<!--pagination-->
<form class="pagination_view disable-highlight" ">
    <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $previous_page }}'" class="pagination__navigation pagination__margin-left" id="previous" value="Previous">
    <div class="pagination_pages">
        @for($counter = $nav_index; $counter < ($nav_index + $navigation_limit) ; $counter++)
                <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $counter+1 }}" class=" @if($counter == $page_number) active @endif">{{ $counter+1 }}</a>
        @endfor
    </div>
    <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $next_page }}'" class="pagination__navigation pagination__margin-right" id="next" value="Next">
</form>

<!--footer-->
@include('blades.footer')

</body>
</html>
