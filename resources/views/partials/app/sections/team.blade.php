<section class="team-section bg-white {{ $classes ?? '' }}">
    <h2 class="section-title-center"><span>@lang('common.main.team')</span></h2>

    <div class="team">
        <div class="team-slider">
            @foreach ($team as $command)
                <a href="{{route('app.command.show', $command)}}" class="teammate">
                    <div class="teammate__img">
                        @if ($command->hasMedia('command'))
                            <img class="lozad" data-src="{{$command->getFirstMedia('command')->getFullUrl('preview')}}" alt="">
                        @else
                            <img class="lozad" data-src="{{ asset('images/no-image.png') }}">
                        @endif
                        <div class="btn btn-primary modal-btn team-btn d-block">@lang('common.main.appointments')</div>
                    </div>
                    <h4 class="teammate__name">{{$command->title}}</h4>
                    <p class="teammate__position">{{$command->content->description}}</p>
                </a>
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
