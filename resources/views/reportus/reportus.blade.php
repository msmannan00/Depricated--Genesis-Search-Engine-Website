<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('reportus.local_initialization')

<body>

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
        <div class="ru_result__container">
            <p class="ru_result__info ru_result--spacing-top disable-highlight" >Bad websites include those that have malicious intent for visitors to the site. Such sites can infect your computer with malware, have some illegal activity or porn or are suspected of phishing for user email addresses or passwords. For example, upon visiting a malware website you may have been prompted to do a security scan of your computer. These scans often look like legitimate Windows security scans. But your computer may develop glitches after running the scan or after leaving the website. There is no central organization set up to defeat these websites, but we encourage users to report to them any bad websites.</p>
            <form class="ru_search-form"  method="GET" action="reportus" enctype="multipart/form-data" onsubmit="return rep.value!={{constant::$emptyString}}">
                <div class="form-control ru-search-box" >
                    <input autocomplete="off" type="search" class="ru-search-box__search-input" name="rep" value="" placeholder="website url ...">
                </div>
                <input type="submit" class="btn btn-primary" value="Report content">
            </form>
        </div>
    </div>


    <!--footer-->
    @include('blades.footer')

</body>
</html>
