
<!--result-status-->
@if($result_count!=0)
    @if($content_type!='searchpage.dlinks.dlinks')
        <div class="rc_result__status disable-highlight">About {{$result_count}} results found</div>
    @endif
@else
    <div class="rc_result-not-found">
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
