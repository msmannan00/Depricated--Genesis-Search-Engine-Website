<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('searchpage.local_initialization')

<!--local php variables-->

<body>

<!--top bar-->
<div class="sb_detail-header">
        <img src="{{constant::$logo_small}}" class="sb_detail-header__logo disable-highlight" alt="" onclick="location.href='{{ url('') }}'" />
        @include('searchpage.blades.header_form')

        @include('searchpage.blades.header_catagory')
    <a href="https://protonmail.com/tor" class="photon_mail disable-highlight photon_mail__link"><span><img  src="{{constant::$mail_icon}}" style="width: 30px;margin-right: 12px"/></span>Proton mail</a>
        <!--warning header-->
        <div class="rc_warning-bar disable-highlight">
            We don't own any of the content. We are just showing their links so if you found something disturbing report us
        </div>

</div>

<div class="sp_size">
    @include('searchpage.blades.result_content')

    <!--result-->
    @include($content_type)
</div>

<!--footer-->
@include('blades.footer')

</body>
</html>
