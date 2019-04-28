<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('about.local_initialization')

<body style="opacity:0" class="delay-load">

    <div class="hp_container_size">
        <!--top bar -->
        @include('blades.grey_header')
        @include('blades.notice_header')


        <div class="ab_result">
            <div class="ab_result__container">
                <article class="markdown-body entry-content" itemprop="text">
                    <h3 class="ab_result__header"><a id="user-content-boogle-search" class="anchor" aria-hidden="true" href="#boogle-search"></a>Download APK</h3>
                    <p class="ab_result__description" style="margin-top: 10px">Download Genesis Search Engine Application From Below</p>
                 <br>
                 <form method="get" action="/android_apk/arm.apk">
                   <button type="submit" class="btn btn-primary">32-bit Mobile Downloads</button>
                 </form><br>
                 <form method="get" action="/android_apk/aarch.apk">
                   <button type="submit" class="btn btn-primary">64-bit Mobile Downloads</button>
                 </form>
                 <br>
                 </div>
          </div>
        <!--footer-->
    </div>

    <!--footer-->
    @include('blades.footer')

</body>
</html>
