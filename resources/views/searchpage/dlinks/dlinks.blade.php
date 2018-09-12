<!--script initialization-->
@include('searchpage.dlinks.local_initialization')

<!--local php variables-->

<!--top bar-->
<div class="main-container">
    <div class="content">
        @foreach($dlink as $rows)
            @php
                $searchQueryTitle = $rows[keys::$dlink_title];
                $searchQueryUrl = $rows[keys::$dlink_url];
            @endphp

            <a href="{{$searchQueryUrl}}">
                <div class="content-container">
                    <div class="content__header"><div class="disable-highlight">{{$searchQueryTitle}}</div></div>
                    <p class="content__link disable-highlight">{{$searchQueryUrl}} </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
<!--pagination-->
<!--footer-->
