<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('homepage.local_initialization')


<body>

<!--top bar-->
<p class="top-bar disable-highlight">
    <span class="top-bar__catagory">Gmail</span>
    <span class="top-bar__catagory">Images</span>
</p>

<!--search bar-->
<form class="search" method="GET" action="search" enctype="multipart/form-data" onsubmit="return q.value!={{constant::$emptyString}}">
    <img src="{{ asset(constant::$logo) }}" class="search__logo disable-highlight" alt="" />
    <input autocomplete="off" type="text" class="form-control search__search-box" name="q">
    <div class="search__button-container disable-highlight">
        <input type="submit" class="search__search-button search__search-button--left-spacing" id="searchbutton" value="Boggle Search">
        <input type="submit" class="search__search-button search__search-button--right-spacing" id="luckybutton" value="I'm Feeling Lucky">
    </div>
    <input autocomplete="off" type="hidden" name="p_num" value="1">
    <input type="hidden" name="s_type" value="all">
    <p class="search__language-text disable-highlight">Boogle offered in: <span class="search__language-name ">English</span></p>
</form>


<!--footer-->
@include('blades.footer')


</body>
</html>
