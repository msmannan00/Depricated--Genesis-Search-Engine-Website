<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
<head>
    @include('blades.shared_initialization')
    @include('homepage.local_initialization')
</head>

<body style="opacity:0" class="delay-load">

    <div class="hp_container_size">
        <!--top bar-->
    @include('blades.light_header')

    <!--search bar-->
        <form id="hp_search" method="GET" action="search" enctype="multipart/form-data" onsubmit="return q.value!={{constant::$emptyString}}">
            <div class="hp_search__logo" id="hp_logo">Genesis Search</div>
            <div style="margin-top: 8px;font-size: calc(13px + 0.45vw);font: Helvetica;text-align: center;color: #003d99;margin-bottom: 20px;">Online Freedom</div>
            <input autocomplete="off" type="text" class="form-control hp_search__search-box" name="q">
            <div class="hp_search__button-container disable-highlight">
                <input type="submit" class="hp_search__search-button hp_search__search-button--left-spacing" id="searchbutton" value="Genesis Search">
                <input type="submit" class="hp_search__search-button hp_search__search-button--right-spacing" id="luckybutton" value="I'm Feeling Lucky">
            </div>
            <input autocomplete="off" type="hidden" name="p_num" value="1">
            <input type="hidden" name="s_type" value="all">
            <p class="hp_search__language-text disable-highlight">Genesis offered in: <span class="hp_search__language-name ">English</span></p>
        </form>

    <!--footer-->
    </div>
    @include('blades.footer')

</body>


</html>
