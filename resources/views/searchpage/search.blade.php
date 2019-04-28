<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
<head>
@include('blades.shared_initialization')
@include('searchpage.local_initialization')
@include('searchpage.local_overrides')
</head>
<!--local php variables-->

<body style="opacity:0" class="delay-load">

    <div class="notice-headertemp">
        <div class="notice-temp"><span>{{$notice}} | </span><span style="color: gray;font-size: 14px">Open these sites using our <a href="https://boogle.store/android">Mobile App</a> | <a href="https://boogle.store/android">https://boogle.store/android</a> or by opening this website on <a href="https://www.torproject.org/download/">Tor Browser On Desktop</a></span></div>
    </div>

    <div class="hp_container_size">
        <!--top bar-->
        <div class="sb_detail-header">
            <a href="./" class="sb_detail-header__logo disable-highlight" id="header__logo" style="text-decoration:none;">Genesis</a>
            @include('searchpage.blades.header_form')
        </div>

        <!--warning header
        <div class="rc_warning-bar disable-highlight">
            We don't own any of the content. We are just showing their links so if you found something disturbing report us
        </div>-->

        <div id={{$content_id}}>
        @include('searchpage.blades.result_content')
        <!--result-->
            @include($content_type)
        </div>

    </div>
    <!--footer-->
    @include('blades.footer')
</body>

</html>
