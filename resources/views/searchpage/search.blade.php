<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('searchpage.local_initialization')

<!--local php variables-->

<body>

<!--top bar-->
<div class="sb_detail-header">
        <img src="{{constant::$logo}}" class="sb_detail-header__logo disable-highlight" alt="" onclick="location.href='{{ url('') }}'" />
        @include('searchpage.blades.header_form')

        @include('searchpage.blades.header_catagory')
</div>

@include('searchpage.blades.result_content')

<!--result-->
@include($content_type)

<!--footer-->
@include('blades.footer')

</body>
</html>
