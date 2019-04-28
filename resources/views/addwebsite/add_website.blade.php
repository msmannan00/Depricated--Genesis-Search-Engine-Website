<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('addwebsite.local_initialization')

<body style="opacity:0" class="delay-load">

<!--top bar -->
<div class="hp_container_size">
    @include('blades.grey_header')

    @include('blades.notice_header')

    <div class="aw_result">
        <div class="aw_result_container">
            <div class="aw_result__header--spacing-top"><p class="aw_result__header disable-highlight">{{$title}}</p></div>
            <p class="aw_result__link disable-highlight">{{$url}}</p>
            <p class="aw_result__info disable-highlight">HOMEPAGE: &nbsp; {{$url_home}}</p>
            <p class="aw_result__info disable-highlight">LIVE: &nbsp;{{$live_date}}</p>
            <p class="aw_result__info disable-highlight">TYPE: &nbsp; {{$s_type}}</p>
            <p class="aw_result__info aw_result__info--margin-bottom disable-highlight">UPDATE: &nbsp; {{$update_date}}</p>
            <p class="aw_result__description disable-highlight">{{$desc}}</p>
        </div>
    </div>

</div>
<!--footer-->
@include('blades.footer')

</body>
</html>
