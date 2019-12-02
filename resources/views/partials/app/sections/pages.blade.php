<section class="front-priview-section">
    <div class="container-fluid">
        <div class="row no-gutters justify-content-center">

            @foreach($pages as $page)
                <div class="col-sm-6 col-xl-4 mb-4 mb-xl-0">
                    <div class="front-priview"
                         style="background-image: url({{$page->slug == 'about'? $page->getFirstMedia('uploads')->getFullUrl(): $page->getFirstMedia('page')->getFullUrl()}})">
                        <a href="{{$page->slug == 'service' ? route('app.services.index') :
                            ($page->slug == 'about' ? route('app.pages.about') :
                            ($page->slug == 'question' ? route('app.faq.index') :
                            ($page->slug == 'contacts' ? route('app.pages.contacts'):
                            ($page->slug == 'reviews' ? route('app.reviews.index'):
                            ($page->slug == 'method' ? route('app.methods.index') : route('app.directions.index'))))))}}" class="content">
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
