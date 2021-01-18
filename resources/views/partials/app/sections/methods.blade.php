<section class="therapy-methods-section d-none d-lg-block">
    <div class="container">
        <div class="row no-gutters">
            @foreach($category->directions as $method)
                @if($loop->index%2 ==0)
                    <div class="col-sm-6 col-xl-4 px-2">
                        @endif
                        <a href="#" class="d-block">
                            <div class="method lozad" data-background-image="{{ $method->getFirstMediaUrl('direction', 'preview') }}">
                                <div class="method__circle d-none d-lg-block"></div>
                                <div class="method__item">
                                    <div class="img lozad"
                                         ></div>
                                    <h3 class="title">{{ $method->title }}</h3>
                                </div>
                            </div>
                        </a>
                        @if($loop->index%2 !=0)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<section class="therapy-methods-media d-lg-none">
    <div class="methods-slider-wrap">
        <div class="methods-slider">
            @foreach($category->directions as $method)
                <div class="d-block methods-slider__item">
                    <div class="method">
                        <div class="method__item">
                            <div class="img lozad"
                                 data-background-image="{{ $method->getFirstMediaUrl('direction', 'preview') }}"></div>
                            <h3 class="title">{{$method->title}}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="team-arrow methods-arrow--prev">
            <svg width="13" height="21">
                <use xlink:href="#arrow-left"></use>
            </svg>
        </div>
        <div class="team-arrow methods-arrow--next">
            <svg width="13" height="21">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </div>
    </div>
</section>
