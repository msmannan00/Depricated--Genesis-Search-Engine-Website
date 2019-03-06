<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('searchpage.local_initialization')
@include('searchpage.local_overrides')

<!--local php variables-->

<body>

    <div class="hp_container_size">
        <!--top bar-->
        <div class="sb_detail-header">
            <a href="./" class="sb_detail-header__logo disable-highlight" style="text-decoration:none;">Genesis</a>
            @include('searchpage.blades.header_form')
        </div>

        <!--warning header
        <div class="rc_warning-bar disable-highlight">
            We don't own any of the content. We are just showing their links so if you found something disturbing report us
        </div>-->

        <div class="sp_size" id={{$content_id}}>
        @include('searchpage.blades.result_content')
        <!--result-->
            @include($content_type)
        </div>

    </div>
    <!--footer-->
    @include('blades.footer')
</body>

</html>
