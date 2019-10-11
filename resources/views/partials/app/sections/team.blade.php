<section class="team-section">
    <h2 class="section-title-center"><span>@lang('common.main.team')</span></h2>

    <div class="team">
        <div class="team-slider">
            @foreach ($team as $teammate)
            <div class="teammate">
                <div class="teammate__img" style="background-image: url({{$teammate->getFirstMedia('command')->getFullUrl()}})"></div>
                <h4 class="teammate__name">{{$teammate->title}}</h4>
                <p class="teammate__position">{{$teammate->content->body}}</p>
            </div>
            @endforeach
        </div>

        <div class="team-arrow team-arrow--prev">
            <svg width="13" height="21">
                <use xlink:href="#arrow-left"></use>
            </svg>
        </div>
        <div class="team-arrow team-arrow--next">
            <svg width="13" height="21">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </div>

    </div>
</section>