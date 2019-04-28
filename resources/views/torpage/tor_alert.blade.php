<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('torpage.local_initialization')

<body style="opacity:0" class="delay-load">

    <!--top bar -->
    @include('blades.grey_header')

    @include('blades.notice_header')

    <div class="ta_result">
        <div class="ta_result__container">
            <div class="ta_result__tor--link"><a href="{{constant::$tor_download_link}}" class="disable-highlight">{{constant::$tor_header}}</a></div>
            <p class="ta_result__link disable-highlight">{{constant::$tor_link}}</p>
            <p class="ta_result__description disable-highlight">{{constant::$tor_body}}</p>

            <div class="ta_result__header--spacing-top"><a class="ta_result__header disable-highlight">{{$title}}</a></div>
            <p class="ta_result__link disable-highlight">{{$url}}</p>
            <p class="ta_result__info disable-highlight">HOMEPAGE: &nbsp; {{$url}} </p>
            <p class="ta_result__info disable-highlight">LIVE: &nbsp; {{$live_date}}</p>
            <p class="ta_result__info disable-highlight">TYPE: &nbsp; {{$s_type}}</p>
            <p class="ta_result__info ta_result__info--margin-bottom disable-highlight">UPDATE: &nbsp; {{$update_date}}</p>
            <p class="ta_result__description disable-highlight">{{$desc}} ....</p>
        </div>
    </div>
    <!--footer-->

    <!--footer-->
    @include('blades.footer')

</body>
</html>
