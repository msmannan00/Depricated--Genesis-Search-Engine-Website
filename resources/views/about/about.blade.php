<!DOCTYPE html>
<html lang="en">

<!--script initialization-->
@include('blades.shared_initialization')
@include('about.local_initialization')

<body style="opacity:0" class="delay-load">

    <div class="hp_container_size">
        <!--top bar -->
        @include('blades.grey_header')

        @include('blades.notice_header')


        <div class="ab_result">
            <div class="ab_result__container">
                <article class="markdown-body entry-content" itemprop="text">
                    <h3 class="ab_result__header"><a id="user-content-boogle-search" class="anchor" aria-hidden="true" href="#boogle-search"></a>Genesis Search</h3>
                    <p class="ab_result__description" style="margin-top: 10px">Genesis Search is a free and open source tool for investigating the Dark Web. For all the amazing technological innovations in the anonymity and privacy space, there is always a consabnt threat that has no effective technological patch human error. Genesis Search Whether it is operational security leaks or software misconfiguration - most often times the atabcks on anonymity don't come from breaking the underlying systems, but from ourselves.</p>
                    <ul>
                        <li class="ab_result__list-item">Genesis Search has two primary goals</li>
                        <li class="ab_result__list-item">We want to help operators of hidden services find and fix operational security issues with their services. We want to help them detect misconfigurations and we want to inspire a new generation of anonymity engineering projects to help make the world a more private place.</li>
                        <li class="ab_result__list-item">Secondly we want to help researchers and investigators monitor and track Dark Web sites. In fact we want to make this as easy as possible. Not because we agree with the goals and motives of every investigation force out there - most often we don't. But by making these kinds of investigations easy, we hope to create a powerful incentive for new anonymity technology (see goal #2)</li>
                    </ul>
                    <h3 class="ab_result__header"><a id="user-content-boogle-search" class="anchor" aria-hidden="true" href="#boogle-search"></a>Feature List</h3>
                    <ul>
                        <li class="ab_result__list-item">Boolean search, natual languae search</li>
                        <li class="ab_result__list-item">Support synonym, stopword</li>
                        <li class="ab_result__list-item">Search result summary, and highlight.</li>
                        <li class="ab_result__list-item">Multiple field searching</li>
                        <li class="ab_result__list-item">Multiple field filtering</li>
                        <li class="ab_result__list-item">Indexing schduling</li>
                        <li class="ab_result__list-item">Full indexing, increment indexing</li>
                    </ul>
                    <h3 class="ab_result__header"><a id="user-content-boogle-search" class="anchor" aria-hidden="true" href="#boogle-search"></a>License</h3>
                    <p class="ab_result__description">The license is Apache License Version 2.0.It's free and you can use it however you want it wharever way.For more information, see <a href="http://www.apache.org/licenses/LICENSE-2.0.txt" rel="nofollow">http://www.apache.org/licenses/LICENSE-2.0.txt</a></p>
                </article>
            </div>
        </div>
        <!--footer-->
    </div>

    <!--footer-->
    @include('blades.footer')

</body>
</html>
