<section id="awards">
    <div class="container">
        <h2 class="text-center mb-3">{{ __('common.main.awards') }}</h2>
        <div class="awards-slider">
            @foreach($awards as $award)
                <div class="awards-slider__item">{{ $award }}</div>
            @endforeach
        </div>
    </div>
</section>
