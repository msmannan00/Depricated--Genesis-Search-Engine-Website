<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('torpage.local_initialization')

<body>

    <!--top bar -->
    <div class="top-bar">
        <img src="{{constant::$logo}}" class="top-bar__logo disable-highlight" alt="" onclick="location.href=''" />
        <p class="top-bar__catagories-container disable-highlight">
            <span class="top-bar__catagories">Gmail</span>
            <span class="top-bar__catagories">Images</span>
        </p>
    </div>

<div class="result">
    <div class="result__tor--link"><a href="{{constant::$tor_download_link}}" class="disable-highlight">{{constant::$tor_header}}</a></div>
    <p class="result__link disable-highlight">{{constant::$tor_link}}</p>
    <p class="result__description disable-highlight">{{constant::$tor_body}}</p>

    <div class="result__header--spacing-top"><a class="result__header disable-highlight">{{$title}}</a></div>
    <p class="result__link disable-highlight">{{$url}}</p>
    <p class="result__header disable-highlight">HOMEPAGE: <span style="margin-left: 3px;font-weight: normal">{{$url}}</span></p>
    <p class="result__header disable-highlight">LIVE: <span style="margin-left: 3px;font-weight: normal">{{$live_date}}</span></p>
    <p class="result__header disable-highlight">TYPE: <span style="margin-left: 3px;font-weight: normal">{{$s_type}}</span></p>
    <p class="result__header result__header--margin-bottom disable-highlight">UPDATE: <span style="margin-left: 3px;font-weight: normal">{{$update_date}}</span></p>
    <p class="result__description disable-highlight">{{$desc}} ....</p>
</div>

<!--footer-->
@include('blades.footer')

</body>
</html>
