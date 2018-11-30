<!--result-url-->
<div class="wp_result">
    @php
    $row_count=0
    @endphp
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
            $row_count += 1;
        @endphp
        @if($s_type_selected=="all" && $result_count>0 && $p_num==0)

            @if ($row_count ==3)
                <div class="wp_image" style="height:180px;margin-bottom: 20px;margin-left: 162.5px">

                    <p style="font-size: 17px;font-family: Arial;margin-left: 20px;margin-top: 10px">Images</p>
                    <hr style="margin-top: -10px"></hr>
                    <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
                    <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
                    <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
                    <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
                </div>
            @endif
            @if ($row_count ==5)
                    <div class="wp_image" style="height:193px;margin-bottom: 20px;margin-left: 162.5px">

                        <p style="font-size: 17px;font-family: Arial;margin-left: 20px;margin-top: 10px">News</p>
                        <hr style="margin-top: -10px"></hr>
                        <div style="background-color: #f1f1f1;cursor: pointer;width: 96%;height: 35px;margin-left: 10px;margin-top: -5px"></div>
                        <div style="background-color: #f1f1f1;cursor: pointer;width: 96%;height: 35px;margin-left: 10px;margin-top: 10px"></div>
                        <div style="background-color: #f1f1f1;cursor: pointer;width: 96%;height: 35px;margin-left: 10px;margin-top: 10px"></div>
                    </div>
            @endif
            @if ($row_count ==7)
                    <div class="wp_image" style="height:193px;margin-bottom: 20px;margin-left: 162.5px">

                        <p style="font-size: 17px;font-family: Arial;margin-left: 20px;margin-top: 10px">Articles</p>
                        <hr style="margin-top: -10px"></hr>
                        <div style="background-color: #f1f1f1;cursor: pointer;width: 96%;height: 35px;margin-left: 10px;margin-top: -5px"></div>
                        <div style="background-color: #f1f1f1;cursor: pointer;width: 96%;height: 35px;margin-left: 10px;margin-top: 10px"></div>
                        <div style="background-color: #f1f1f1;cursor: pointer;width: 96%;height: 35px;margin-left: 10px;margin-top: 10px"></div>
                    </div>
            @endif
        @endif
        <div class="wp_result__header--spacing-top">
            <a href="{{ $webRedirection }}" class="wp_result__header disable-highlight">{{ $searchQueryTitle }}</a>
            <p class="wp_result__link disable-highlight">{{ $searchQueryUrl }}</p>
            <p class="wp_result__description disable-highlight">{{ substr($searchQueryDescription, constant::$zero, constant::$max_description_limit).'...' }}</p>
        </div>
    @endforeach
</div>

@if ($s_type_selected=="all" && $result_count>0 && $p_num==0)
    <div class="wp_info" >

        <p style="font-size: 23px;font-family: Arial;margin-left: 20px;margin-top: 10px">Oculus Search</p>
        <p style="font-size: 14px;color: #1c7430;font-family: Arial;margin-left: 20px;margin-top: -22px">http://localhost/BoogleSearch/public/sear</p>
        <hr style="margin-top: 2%"></hr>
        <p style="font-size: 14px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 0px;width: 94%">You can also find more information regarding your search query using filters above. You can also use our direct hotlinks for your query. Result count and some high indexed urls are given below.</p>
        <br>
        <div style=";font-size: 14px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 0px;width: 94%"><strong>Latest News: </strong><span style="font-size: 14px;color: blue">8293</span></div>
        <div style="font-size: 14px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 10px;width: 94%"><strong>Awesome Images: </strong><span style="font-size: 14px;color: blue">6412</span></div>
        <div style="font-size: 14px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 10px;width: 94%"><strong>Video Links: </strong><span style="font-size: 14px;color: blue">2141</span></div>
        <div style="font-size: 14px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 10px;width: 94%"><strong>Documents: </strong><span style="font-size: 14px;color: blue">4123</span></div>
        <div style="font-size: 14px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 10px;width: 94%"><strong>Finance: </strong><span style="font-size: 14px;color: blue">3123</span></div>
        <p style="font-size: 18px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 25px;width: 94%">People also search for</p>
        <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 20px;float: left"></div>
        <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 20px;float: left"></div>
        <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 20px;float: left"></div>
    </div>
@endif

@if ($s_type_selected=="all" && $result_count>0 && $p_num==0)
    <div class="wp_image" style="margin-top: 40px">

        <p style="font-size: 21px;font-family: Arial;margin-left: 20px;margin-top: 10px">Images</p>
        <hr style="margin-top: -5px"></hr>
        <p style="font-size: 14px;color: grey;font-family: Arial;margin-left: 20px;margin-top: 0px;width: 94%">You may also find the following images interesting</p>
        <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
        <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
        <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
        <div style="background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>

        <div style="margin-top: 30px;background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
        <div style="margin-top: 30px;background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
        <div style="margin-top: 30px;background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
        <div style="margin-top: 30px;background-color: #f1f1f1;cursor: pointer;width: 100px;height: 100px;margin-left: 18px;float: left"></div>
    </div>
@endif

<!--pagination-->
<form class="wp_pagination_view disable-highlight">
    @if ($result_count>0)
         <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&p_num={{ $previous_page}}&s_type={{$s_type_selected}}'" class="wp_pagination__navigation wp_pagination--border-left wp_pagination__margin-left" id="previous" value="Previous">
         <div class="wp_pagination_pages">
             @for($counter = $nav_index; $counter < ($nav_index + constant::$navigation_limit) ; $counter++)
                 @if ($counter>=0)
                    <a href="http://localhost/BoogleSearch/public/search?q={{ $query }}&&s_type={{$s_type_selected}}&p_num={{ $counter+1 }}" class=" @if($counter == $p_num) active @endif" >{{ $counter+1 }}</a>
                 @endif
             @endfor
         </div>
         <input type="button" onclick="window.location='http://localhost/BoogleSearch/public/search?q={{ $query }}&p_num={{ $next_page }}&s_type={{$s_type_selected}}'" class="wp_pagination__navigation wp_pagination--border-right wp_pagination__margin-right" id="next" value="Next">
    @endif
</form>
