<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('homepage.local_initialization')

<body>

    <div class="hp_container_size">
        <!--top bar-->
    @include('blades.light_header')

        <div style="position: relative;min-height: 60vh;"></div>
        <!--search bar-->
        <form class="hp_search" method="GET" action="search" enctype="multipart/form-data" onsubmit="return q.value!={{constant::$emptyString}}">
            <div style="font-size: calc(31px + 1vw);font-family: Calibri;text-align: center;color: darkblue;margin-bottom: -17px">GENESIS SEARCH</div>
            <div style="margin-top: 4px;font-size: calc(15px + 0.3vw);font-family: Calibri;text-align: center;color: darkblue;margin-bottom: 20px">Online Freedom</div>
            <input autocomplete="off" type="text" class="form-control hp_search__search-box" name="q">
            <div class="hp_search__button-container disable-highlight">
                <input type="submit" class="hp_search__search-button hp_search__search-button--left-spacing" id="searchbutton" value="Boggle Search">
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
