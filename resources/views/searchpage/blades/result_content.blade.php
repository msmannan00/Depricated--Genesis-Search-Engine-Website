<!--result-status-->


@if($result_count!=0)
    @if($content_type!='searchpage.dlinks.dlinks')
        <div class="rc_result__status disable-highlight" id="dlresult_info" >About {{$result_count}} results found</div>
    @endif
    @if($query_hint!="0")
        <div @if($content_type=='searchpage.dlinks.dlinks') @endif id="dlresult_info_margin" class="rc_suggest__status disable-highlight"><div>Search instead for <a href="/search?q={{preg_replace('/\s+/','+',$query_hint)}}&p_num={{$p_num+1}}&s_type={{$s_type_selected}}" style="color: darkblue;font-weight : bold;font-style: italic">{{$query_hint}}</a></div></div>
        
    @endif
@else
    @if($query_hint!="0")
        <div @if($content_type=='searchpage.dlinks.dlinks') @endif  id="dlresult_info"  class="rc_suggest__status disable-highlight">Search instead for <a href="/search?q={{preg_replace('/\s+/','+',$query_hint)}}&p_num={{$p_num+1}}&s_type={{$s_type_selected}}" style="color: darkblue;font-weight : bold;font-style: italic">{{$query_hint}}</a></div>
    @endif
    <div class="rc_result-not-found" id="dlresult_info">
        <!--<p class="rc_result-not-found__message-header"> Your search - <br><p class="rc_result-not-found__message-header--query"> <strong>{{$query}}</strong></p> did not match any documents in <strong>{{$n_type}}</strong> network</p>-->
        <p class="rc_result-not-found__message-header"> Your search -<strong>{{$query}}</strong> did not match any documents in <strong>{{$n_type}}</strong> network</p>
        <p class="rc_result-not-found__suggestion-text">Suggestions:</p>
        <ul class="rc_result-not-found__suggestion-container">
            <li class="rc_result-not-found__suggestion-item">Try changing network type</li>
            <li class="rc_result-not-found__suggestion-item">Make sure spellings are correct.</li>
            <li class="rc_result-not-found__suggestion-item">Try different keywords.</li>
            <li class="rc_result-not-found__suggestion-item">Try more general keywords.</li>
        </ul>
    </div>
@endif