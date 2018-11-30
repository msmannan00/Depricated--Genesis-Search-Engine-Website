<!--Network Type Menu-->
<div class="hc_drop-down disable-highlight">
    <div class="hc_drop-down__button">{{$n_type}}</div>
    <div class="hc_drop-down__content">
        <form method="GET" action="search" enctype="multipart/form-data" onsubmit="return web.value!={{constant::$emptyString}}">
            <a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=onion&s_type={{$s_type_selected}}" class="hc_drop-down__item hc_drop-down__top-item">&nbsp;&nbsp;Onion Network</a>
            <a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=i2p&s_type={{$s_type_selected}}" class="hc_drop-down__item">&nbsp;&nbsp;I2P Network</a>
            <a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=freenet&s_type={{$s_type_selected}}" class="hc_drop-down__item">&nbsp;&nbsp;Freenet Network</a>
            <a href="{{constant::$search_base_url }}q={{$query}}&p_num=1&n_type=global&s_type={{$s_type_selected}}" class="hc_drop-down__item">&nbsp;&nbsp;Global Network</a>
            <input autocomplete="off" type="hidden" name="p_num" value="1">
            <input autocomplete="off" type="hidden" name="s_type" value="{{$s_type_selected}}">
        </form>
    </div>
</div>

<!--Report Website-->
<div class="hc_drop-down hc_drop-down--margin-left disable-highlight">
    <div class="hc_drop-down__button">Add website</div>
    <div class="hc_drop-down__content hc_drop-down__content--size">
        <p class="hc_drop-down__report-header">Report Website</p>
        <hr>
        <form method="GET" action="add_website" enctype="multipart/form-data" onsubmit="return url.value!={{constant::$emptyString}}">
            <label class="hc_drop-down__report-label">Website</label>
            <input autocomplete="off" type="search" class="form-control hc_drop-down__report-input disable-highlight" name="url" value="">
            <label class="hc_drop-down__report-label hc_drop-down__report-label--margin-top"> Description</label>
            <textarea autocomplete="off" type="search" name="desc" value="" class="form-control hc_drop-down__report-input hc_drop-down__report-input--height disable-highlight" placeholder="(Optional)"></textarea>
            <input autocomplete="off" type="submit" value="SUBMIT" class="btn btn-primary hc_drop-down__report-button">
        </form>
    </div>
</div>
