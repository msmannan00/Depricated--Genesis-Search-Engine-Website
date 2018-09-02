<!DOCTYPE html>
<html lang="en">

<!--shared script initialization-->
    @include('blades.sharedibs')

<!--libraries initializations-->
<head>
    <script type="text/javascript" src="{{ asset('js/js-index-page.js') }}"></script>
    <link href="{{ asset('css/cs-index-page.css') }}" rel="stylesheet" />
</head>

<body>

<!--top bar-->
<p class="top-bar disable-highlight">
    <span class="top-bar__catagory">Gmail</span>
    <span class="top-bar__catagory">Images</span>
</p>

<!--search bar-->
<form class="search" method="GET" action="search" enctype="multipart/form-data">
    <img src="{{ asset('images/logo.png') }}" class="search__logo disable-highlight" alt="" />
    <input autocomplete="off" type="text" class="form-control search__search-box" name="q">
    <div class="search__button-container disable-highlight">
        <input type="submit" class="search__search-button search__spacing-left-button" id="searchbutton" value="Boggle Search">
        <input type="submit" class="search__search-button search__spacing-right-button" id="luckybutton" value="I'm Feeling Lucky">
    </div>
    <p class="search__language-text disable-highlight">Boogle offered in: <span class="search__language-name ">English</span></p>
</form>


<!--footer-->
    @include('blades.footer')


</body>
</html>
