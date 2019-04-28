<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('createwebsite.local_initialization')

<body style="opacity:0" class="delay-load">

<div class="hp_container_size">
    <!--top bar -->
    @include('blades.grey_header')

    @include('blades.notice_header')

    <div class="ru_result">
        <div class="ru_result ru_result__container">
            <p class="ru_result__info ru_result--spacing-top disable-highlight" >Add your site to our search engine index to help us learn more about hidden services. Adding your onion will allow users of our search engine to find your hidden service and its content. Please do not add child abuse material; it will not be indexed and your hidden service will be blacklisted.<br></p>
            <p class="ru_result__info ru_result--spacing-top disable-highlight">Give detail description of your website offering and associated url</p>
            <form class="ru_search-form"  method="GET" action="add_website" enctype="multipart/form-data" onsubmit="return rep.value!={{constant::$emptyString}}">
                <input autocomplete="off" type="search" class="form-control ru-search-box" name="rep" value="" placeholder="Website url ...">
                <textarea class="form-control ru-search-box ru-search-area" rows="4" cols="150" placeholder="(Optional) Describe why you are offering in this website..."></textarea>
                <input type="submit" class="btn btn-primary" name="url" value="Add Website">
            </form>
        </div>
    </div>
</div>

<!--footer-->
@include('blades.footer')

</body>
</html>
