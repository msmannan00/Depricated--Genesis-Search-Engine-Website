<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('torpage.local_initialization')

<body>

    <!--top bar -->
    <div class="top-bar">
        <img src="images/logo.png" class="top-bar__logo disable-highlight" alt="" onclick="location.href='javascript:history.back()'" />
        <p class="top-bar__catagories-container disable-highlight">
            <span class="top-bar__catagories">Gmail</span>
            <span class="top-bar__catagories">Images</span>
        </p>
    </div>

<div class="result-url">
    <div class="url-description"><a href="https://www.torproject.org/download/download-easy.html.en" class="disable-highlight">TOR BROWSER NOT FOUND. CLICK HERE TO DOWNLOAD REQUIRED BROWSER</a></div>
    <p class="result-url__link disable-highlight">https://www.torproject.org/download/download-easy.html.en</p>
    <p class="result-url__description disable-highlight">Websites from dark web can only be accessed from tor proxy servers</p>

    <div class="result-url__header-spacing-top"><a class="result-url__header disable-highlight">{{$title}}</a></div>
    <p class="result-url__link disable-highlight">{{$url}}</p>
    <p class="result-url__description-header disable-highlight">HOMEPAGE: <span style="margin-left: 3px;font-weight: normal">{{$url}}</span></p>
    <p class="result-url__description-header disable-highlight">LIVE: <span style="margin-left: 3px;font-weight: normal">{{$live_date}}</span></p>
    <p class="result-url__description-header disable-highlight">TYPE: <span style="margin-left: 3px;font-weight: normal">{{$type}}</span></p>
    <p class="result-url__description-header result-url__description-header-margin-bottom disable-highlight">UPDATE: <span style="margin-left: 3px;font-weight: normal">{{$update_date}}</span></p>
    <p class="result-url__description disable-highlight">{{$description}} ....</p>
</div>

<!--footer-->
@include('blades.footer')

</body>
</html>
