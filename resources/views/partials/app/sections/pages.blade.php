<section class="front-priview-section">
    <div class="container-fluid">
        <div class="row no-gutters">

            @foreach($pages as $page)
                <div class="col-xl-4">
                    <div class="front-priview"
                         style="background-image: url({{$page->getFirstMedia('page')->getFullUrl()}})">
                        <div class="content">
                            <h3 class="content__title">{{$page->title}}</h3>
                            <div class="slide-wrap">
                                <p class="content__text">{{$page->content->description}}</p>
                                <a href="#" class="content__link">
                                    <span>@lang('common.main.details')</span>
                                    <svg width="20" height="6">
                                        <use xlink:href="#arrow-link"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


</section>
