<!--warning header-->
<div class="rc_warning-bar disable-highlight">
    <p>We don't own any of the content. We are just showing their links so if you found something disturbing report us
    </p>
</div>

<!--result-status-->
@if($result_count!=0)
    @if($content_type!='searchpage.dlinks.dlinks')
        <p class="rc_result__status">About {{$result_count}} results found</p>
    @endif
@else
    <div class="rc_result-not-found">
        <p class="rc_result-not-found__message-header"> Your search - <br><div class="rc_result-not-found__message-header--query"> <strong>{{$query}}</strong></div> did not match any documents in <strong>{{$n_type}}</strong> network</p>
        <p class="rc_result-not-found__suggestion-text">Suggestions:</p>
        <ul class="rc_result-not-found__suggestion-container">
            <li class="rc_result-not-found__suggestion-item">Try changing current network type</li>
            <li class="rc_result-not-found__suggestion-item">Make sure that all words are spelled correctly.</li>
            <li class="rc_result-not-found__suggestion-item">Try different keywords.</li>
            <li class="rc_result-not-found__suggestion-item">Try more general keywords.</li>
        </ul>
    </div>
@endif
