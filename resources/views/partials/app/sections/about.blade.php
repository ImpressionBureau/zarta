<section class="about-section">
    <div class="container-fluid">
        <div class="row justify-content-center justify-content-xl-end">
            <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 offset-xl-1 order-xl-2 mb-4 mb-xl-0">
                <div class="about-galery">
                    <div class="about-slider">
                        @foreach($about->getMedia('uploads') as $img)
                            <div class="about-slider__item lozad" data-background-image="{{$img->getFullUrl()}}"></div>
                        @endforeach
                    </div>

                    <div class="about-slider-nav d-flex">
                        <div class="texting-arrow about-arrow--left">
                            <svg width="9" height="15">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                        </div>
                        <div class="texting-arrow about-arrow--right">
                            <svg width="9" height="15">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-4 order-xl-1">
                <div class="section-decor section-decor--article">
                    <img src="{{ asset('images/about-img.svg') }}" alt="">
                </div>

                <div class="about">
                    <h2 class="mb-4">{{$about->title}}</h2>
                    <div class="about-text">
                        @if($about->content->description)
                            {{$about->content->description}}
                        @else
                            {!! remove_tags($about->content->body, 1000) !!}
                        @endif
                    </div>
                    <a href="{{ route('app.pages.about') }}"
                       class="btn btn-secondary mt-4"><span>@lang('common.main.more_info')</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
