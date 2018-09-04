<!DOCTYPE html>
<html lang="en">

<!--shared script initialization-->
    @include('blades.sharedibs')

<!--libraries initializations-->
<head>
    <script type="text/javascript" src="{{ asset('js/searchpage.js') }}"></script>
    <link href="{{ asset('css/cs-searchpage.css') }}" rel="stylesheet" />
</head>


<body>

<!--top bar-->
<div class="top-bar">
	<div class="top-bar__sub-container">
		<img src="images/logo.png" class="top-bar__logo disable-highlight" alt="" onclick="location.href='{{ url('') }}'" />
		<form class="top-bar__search-form" method="GET" action="search" enctype="multipart/form-data" onsubmit="return q.value!=''">
			<input autocomplete="off" type="search" class="form-control top-bar__search-box" name="q" value="{{ $search_model[config('constant.search_query_key')] }}">
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

		</form>
	</div>
	<div style="clear: left;"></div>
</div>

<!--result-url-->
<div class="result-url">
    <p class="result-status">About 1,030,000,000 results</p>
    @foreach($web_model as $rows)
        <p class="result-url__header">{{ $rows[config('constant.web_title_key')] }}</p>
        <p class="result-url__link">{{ $rows[config('constant.web_url_key')] }}</p>
        <p class="result-url__description">{{ $rows[config('constant.web_description_key')] }}</p>
    @endforeach
</div>

<!--pagination-->
<form class="pagination_view disable-highlight">
	  <input type="submit" class="pagination__navigation pagination__margin-left" id="searchbutton" value="Previous">
		  <div class="pagination_pages">
			 <a href="#" class="active">1</a>
			 <a href="#">2</a>
			 <a href="#">3</a>
			 <a href="#">4</a>
			 <a href="#">5</a>
			 <a href="#">6</a>
		  </div>
	  <input type="submit" class="pagination__navigation pagination__margin-right" id="luckybutton" value="Next">
</form>

<!--footer-->
    @include('blades.footer')

</body>
</html>
