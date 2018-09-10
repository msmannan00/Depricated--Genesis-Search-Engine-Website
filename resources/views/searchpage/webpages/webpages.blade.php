<!--result-url-->
<div class="result-url">
    <p class="result-status">About {{$result_count}} results found</p>

    @foreach($result as $rows)
        @php
            $searchQueryTitle = $rows[config('constant.web_title_key')];
            $searchQueryUrl = $rows[config('constant.web_url_key')];
            $searchQueryDescription = $rows[config('constant.web_description_key')];
            $webRedirection = $rows[config('constant.web_redirection_key')];
        @endphp
        <div class="result-url__header-spacing-top"><a href="{{ $webRedirection }}" class="result-url__header disable-highlight">{{ $searchQueryTitle }}</a></div>
        <p class="result-url__link disable-highlight">{{ $searchQueryUrl }}</p>
        <p class="result-url__description disable-highlight">{{ substr($searchQueryDescription, 0, 220).'...' }}</p>
    @endforeach
</div>

<!--pagination-->
<form class="pagination_view disable-highlight" ">
<input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $previous_page }}'" class="pagination__navigation pagination__margin-left" id="previous" value="Previous">
<div class="pagination_pages">
    @for($counter = $nav_index; $counter < ($nav_index + $navigation_limit) ; $counter++)
        <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $counter+1 }}" class=" @if($counter == $page_number) active @endif">{{ $counter+1 }}</a>
    @endfor
</div>
<input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $next_page }}'" class="pagination__navigation pagination__margin-right" id="next" value="Next">
</form>
