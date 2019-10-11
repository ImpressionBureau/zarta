<section class="front-priview-section">
    <div class="container-fluid">
        <div class="row no-gutters">

            @foreach($pages as $page)
                <div class="col-4">
                    <div class="front-priview"
                         style="background-image: url({{$page->slug == 'about'? $page->getFirstMedia('uploads')->getFullUrl(): $page->getFirstMedia('page')->getFullUrl()}})">
                        <a href="#" class="content">
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
    </div>


</section>
