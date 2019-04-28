<!--script initialization-->
@include('searchpage.dlinks.local_initialization')

<!--local php variables-->
<!--top bar-->
    <div class="dl_content">

        @if ($result_count>0)
                <div class="dl_content__container" >
                    @foreach($dlink as $rows)
                        @php
                            $searchQueryTitle = substr($rows[keys::$dlink_title],0,35);
                            $searchQueryUrl = $rows[keys::$dlink_url];
                            $searchExtension = $rows[keys::$dlink_extension];
                        @endphp

                        <a href="{{$searchQueryUrl}}">
                            <div class="dl_content__inner-container disable-highlight">
                                <div class="dl_content__header"><div class="disable-highlight">{{$searchQueryTitle}}</div></div>
                                <p class="dl_content__extension">{{$searchExtension}}</p>
                                <img src="{{$dlink_icon}}" class="dl_content__image__icon"/>
                                <!--<p class="content__link disable-highlight">{{$searchQueryUrl}} </p>-->
                                <p class="dl_content__host ">{{parse_url($searchQueryUrl, PHP_URL_HOST)}}</p>
                            </div>
                        </a>
                    @endforeach
            </div>
        @endif
    </div>
        <!--pagination-->
        @if ($result_count>15)
        <form class="dl_pagination_view disable-highlight " id="dlpageination" style="margin-bottom:80px">
            @if ($result_count>0)
                <input type="button" onclick="window.location='/search?q={{ $query }}&p_num={{ $previous_page}}&s_type={{$s_type_selected}}'" class="wp_pagination__navigation wp_pagination--border-left wp_pagination__margin-left" id="previous" value="Previous">
                <div class="wp_pagination_pages">
                    @for($counter = $nav_index; $counter < ($nav_index + constant::$dlink_navigation_limit) ; $counter++)
                        @if ($counter>=0)
                            <a href="/search?q={{ $query }}&&s_type={{$s_type_selected}}&p_num={{ $counter+1 }}" class=" @if($counter == $p_num) active @endif" >{{ $counter+1 }}</a>
                        @endif
                    @endfor
                </div>
                <input type="button" onclick="window.location='/search?q={{ $query }}&p_num={{ $next_page }}&s_type={{$s_type_selected}}'" class="wp_pagination__navigation wp_pagination--border-right wp_pagination__margin-right" id="next" value="Next">
            @endif
        </form>
        @endif

<!--footer-->
