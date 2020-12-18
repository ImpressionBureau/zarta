<section class="therapy-methods-section d-none d-lg-block">
    <div class="container">
        <div class="row no-gutters">
            @foreach($methods as $method)
                @if($loop->index%2 ==0)
                    <div class="col-sm-6 col-xl-4 px-2">
                        @endif
                        @if($loop->first)
                            <h2 class="section-title mb-5 therapy-method__title">@lang('common.main.direction')</h2>
                        @endif
                        @if($method->directions->count())
                            <a href="{{route('app.directions.index', $method)}}" class="d-block">
                                <div class="method">
                                    <div class="method__circle d-none d-lg-block"></div>
                                    <div class="method__item">
                                        <div class="img lozad"
                                             data-background-image="{{$method->getFirstMediaUrl('category')}}"></div>
                                        <h3 class="title">{{$method->title}}</h3>
                                    </div>
                                    <div class="method__item">
                                        <div class="list">
                                            {!! remove_tags_direction($method->content->description) !!}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @else
                            <div class="d-block">
                                <div class="method">
                                    <div class="method__circle d-none d-lg-block"></div>
                                    <div class="method__item">
                                        <div class="img lozad"
                                             data-background-image="{{$method->getFirstMediaUrl('category')}}"></div>
                                        <h3 class="title">{{$method->title}}</h3>
                                    </div>
                                    <div class="method__item">
                                        <div class="list">
                                            {!! remove_tags_direction($method->content->description) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($loop->index%2 !=0)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>


<section class="therapy-methods-media d-lg-none">
    <h2 class="section-title mb-5 mx-4 therapy-method__title">@lang('common.main.direction')</h2>

    <div class="methods-slider-wrap">
        <div class="methods-slider">
            @foreach($methods as $method)
                @if($method->directions->count())
                    <a href="{{route('app.directions.index', $method)}}" class="d-block methods-slider__item">
                        <div class="method">
                            <div class="method__item">
                                <div class="img lozad"
                                     data-background-image="{{$method->getFirstMediaUrl('category')}}"></div>
                                <h3 class="title">{{$method->title}}</h3>
                            </div>
                            <div class="method__item">
                                <div class="list">
                                    {!! remove_tags_direction($method->content->description) !!}
                                </div>
                            </div>
                        </div>
                    </a>
                @else
                    <div class="d-block methods-slider__item">
                        <div class="method">
                            <div class="method__item">
                                <div class="img lozad"
                                     data-background-image="{{$method->getFirstMediaUrl('category')}}"></div>
                                <h3 class="title">{{$method->title}}</h3>
                            </div>
                            <div class="method__item">
                                <div class="list">
                                    {!! remove_tags_direction($method->content->description) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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
