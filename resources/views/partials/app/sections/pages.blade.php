<section class="front-priview-section">

    <div class="pages-slider">
        @foreach($pages as $page)
            <div class="pages-slider__item">
                <div class="front-priview lozad"
                     data-background-image="{{$page->slug == 'about' ? optional($page->getFirstMedia('uploads'))->getFullUrl() : optional($page->getFirstMedia('page'))->getFullUrl()}}">
                    <a href="{{ url($page->slug)  }}"
                       class="content">
                        <h3 class="content__title">{{$page->title}}</h3>
                        <div class="slide-wrap d-none d-xl-block">
                            <p class="content__text">{{$page->content->description}}</p>
                            <div class="content__link">
                                <span>@lang('common.main.details')</span>
                                <svg width="20" height="6">
                                    <use xlink:href="#arrow-link"></use>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        @endforeach
    </div>

    <div class="team-arrow pages-arrow--prev">
        <svg width="13" height="21">
            <use xlink:href="#arrow-left"></use>
        </svg>
    </div>
    <div class="team-arrow pages-arrow--next">
        <svg width="13" height="21">
            <use xlink:href="#arrow-right"></use>
        </svg>
    </div>

</section>
