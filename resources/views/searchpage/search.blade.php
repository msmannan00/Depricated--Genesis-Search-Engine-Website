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
		<img src="images/logo.png" class="top-bar__logo disable-highlight" alt=""/>
		<form class="top-bar__search-form">
			<input autocomplete="off" type="text" class="form-control top-bar__search-box" id="searchbox">
		    <p class="top-bar__catagories-container">
			   <span class="top-bar__catagories active" id="catagory_all" onMouseDown="search_manager.onCatagorySelected('catagory_all')">All</span>
			   <span class="top-bar__catagories disable-highlight" id="catagory_images" onMouseDown="search_manager.onCatagorySelected('catagory_images')">Images</span>
			   <span class="top-bar__catagories disable-highlight" id="catagory_video" onMouseDown="search_manager.onCatagorySelected('catagory_video')">Videos</span>
			   <span class="top-bar__catagories disable-highlight" id="catagory_book" onMouseDown="search_manager.onCatagorySelected('catagory_book')">Books</span>
			   <span class="top-bar__catagories disable-highlight" id="catagory_finance" onMouseDown="search_manager.onCatagorySelected('catagory_finance')">Finance</span>
			   <span class="top-bar__catagories disable-highlight" id="catagory_news" onMouseDown="search_manager.onCatagorySelected('catagory_news')">News</span>
			</p>
		</form>
		<img class="top-bar__search-icon disable-highlight" src="images/search.png" alt=""/>
	</div>
	<div style="clear: left;"></div>
</div>
	
<!--result status-->
<p class="result-status">About 1,030,000,000 results</p>
	
<!--result-url-->
<div class="result-url">
	<p class="result-url__header">"Hello, World!" program - Wikipedia</p>
	<p class="result-url__link">https://en.wikipedia.org/wiki/%22Hello,_World!%22_program</p>
	<p class="result-url__description">A "Hello, World!" program is a computer program that outputs or displays "Hello, World!" to a user. Being a very simple program in most programming languages, it is often used to illustrate the basic syntax of a programming language for a working program, and as such is often the very first program people write</p>
</div>
	
<!--pagination-->
<form class="pagination disable-highlight">
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
