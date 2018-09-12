<!--result-url-->
<div class="result">
    <p class="result__status">About {{$result_count}} results found</p>

    @foreach($result as $rows)
        @php
            $searchQueryTitle = $rows[keys::$title];
            if(strlen($searchQueryTitle)>65)
            {
                $searchQueryTitle = substr($searchQueryTitle,constant::$zero,65)."...";
            }
            $searchQueryUrl = $rows[keys::$url];
            $searchQueryDescription = $rows[keys::$description];
            $webRedirection = $rows[keys::$redirection];
        @endphp
        <a href="{{ $webRedirection }}" class="result__header result__header--spacing-top disable-highlight">{{ $searchQueryTitle }}</a>
        <p class="result__link disable-highlight">{{ $searchQueryUrl }}</p>
        <p class="result__description disable-highlight">{{ substr($searchQueryDescription, constant::$zero, constant::$max_description_limit).'...' }}</p>
    @endforeach
</div>

<!--pagination-->
    <form class="pagination_view disable-highlight">
        <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $previous_page }}&s_type={{$s_type_selected}}'" class="pagination__navigation pagination__margin-left" id="previous" value="Previous">
        <div class="pagination_pages">
            @if ($nav_index>=0)
                @for($counter = $nav_index; $counter < ($nav_index + constant::$navigation_limit) ; $counter++)
                    <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&&s_type={{$s_type_selected}}&p_num={{ $counter+1 }}" class=" @if($counter == $p_num) active @endif" >{{ $counter+1 }}</a>
                @endfor
            @else
                    <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&&s_type={{$s_type_selected}}&p_num={{ 1 }}" class="active" >1</a>
            @endif
        </div>
        <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $next_page }}'" class="pagination__navigation pagination__margin-right" id="next" value="Next">
    </form>
