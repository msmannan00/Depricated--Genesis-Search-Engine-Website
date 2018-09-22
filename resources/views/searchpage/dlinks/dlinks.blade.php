<!--script initialization-->
@include('searchpage.dlinks.local_initialization')

<!--local php variables-->

<!--top bar-->
    <div class="dl_content">
        @if ($result_count>0)
                <div class="dl_content__container" >
                    @foreach($dlink as $rows)
                        @php
                            $searchQueryTitle = $rows[keys::$dlink_title];
                            $searchQueryUrl = $rows[keys::$dlink_url];
                            $searchExtension = $rows[keys::$dlink_extension];
                        @endphp

                        <a href="{{$searchQueryUrl}}">
                            <div class="dl_content__inner-container disable-highlight">
                                <div class="dl_content__header"><div class="disable-highlight">{{$searchQueryTitle}}</div></div>
                                <p class="dl_content__extension">{{$searchExtension}}</p>
                                <img src="{{$dlink_icon}}" class="dl_content__image__icon"/>
                                <!--<p class="content__link disable-highlight">{{$searchQueryUrl}} </p>-->
                            </div>
                        </a>
                    @endforeach
            </div>
        @endif
    </div>
<!--pagination-->
<!--footer-->
