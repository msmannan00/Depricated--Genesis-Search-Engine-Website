<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('reportus.local_initialization')

<body style="opacity:0" class="delay-load">

    <div class="hp_container_size">
        <!--top bar -->
        @include('blades.grey_header')

        @include('blades.notice_header')

        @if($success != '')
            <div class="ru_result__complaint disable-highlight">
                <div class="ru_result__container ru_complaint__container--height">
                    <p class="ru_result__complaint--color">{{$success}}</p>
                </div>
            </div>
        @endif

        <div class="ru_result">
            <div class="ru_result ru_result__container">
                <p class="ru_result__info ru_result--spacing-top disable-highlight" >Bad websites include those that have malicious intent for visitors to the site. Such sites can infect your computer with malware, have some illegal activity or porn or are suspected of phishing for user email addresses or passwords. For example, upon visiting a malware website you may have been prompted to do a security scan of your computer. These scans often look like legitimate Windows security scans. But your computer may develop glitches after running the scan or after leaving the website. There is no central organization set up to defeat these websites, but we encourage users to report to them any bad websites.<br></p>
                <p class="ru_result__info ru_result--spacing-top disable-highlight">Describe what you have seen so that our team can review it and get back to you</p>
                <form class="ru_search-form"  method="GET" action="reportus" enctype="multipart/form-data" onsubmit="return rep.value!={{constant::$emptyString}}">
                    <input autocomplete="off" type="search" class="form-control ru-search-box" name="rep" value="" placeholder="Website url ...">
                    <textarea class="form-control ru-search-box ru-search-area" rows="4" cols="150" placeholder="(Optional) Describe why you want to report this website..."></textarea>
                    <input type="submit" class="btn btn-primary" value="Report content">
                </form>
            </div>
        </div>
    </div>

    <!--footer-->
    @include('blades.footer')

</body>
</html>
