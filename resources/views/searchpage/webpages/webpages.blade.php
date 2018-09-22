<!--result-url-->
<div class="wp_result">
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
        <div class="wp_result__header--spacing-top">
            <a href="{{ $webRedirection }}" class="wp_result__header disable-highlight">{{ $searchQueryTitle }}</a>
            <p class="wp_result__link disable-highlight">{{ $searchQueryUrl }}</p>
            <p class="wp_result__description disable-highlight">{{ substr($searchQueryDescription, constant::$zero, constant::$max_description_limit).'...' }}</p>
        </div>
    @endforeach
</div>

<!--pagination-->
<form class="wp_pagination_view disable-highlight">
    @if ($result_count>0)
         <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $previous_page }}&s_type={{$s_type_selected}}'" class="wp_pagination__navigation wp_pagination__margin-left" id="previous" value="Previous">
         <div class="wp_pagination_pages">
             @if ($nav_index>=0)
                 @for($counter = $nav_index; $counter < ($nav_index + constant::$navigation_limit) ; $counter++)
                    <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&&s_type={{$s_type_selected}}&p_num={{ $counter+1 }}" class=" @if($counter == $p_num) active @endif" >{{ $counter+1 }}</a>
                 @endfor
             @else
                 <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&&s_type={{$s_type_selected}}&p_num={{ 1 }}" class="active" >1</a>
             @endif
         </div>
         <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&page={{ $next_page }}'" class="wp_pagination__navigation wp_pagination__margin-right" id="next" value="Next">
    @endif
</form>
