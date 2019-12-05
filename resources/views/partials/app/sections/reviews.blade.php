<section class="feedback-section">
    <div class="container-fluid">
        <div class="row no-gutters align-items-center justify-content-center">
            <div class="col-xl-6 col-xxl-5 d-flex flex-column  justify-content-center order-xl-2">
                <div class="texting-feedback flex-grow-1">
                    <h3 class="mb-4">@lang('common.main.review')</h3>
                    <div class="texting-slider">
                        @foreach ($reviews as $review)
                        <div class="texting-slider__item">
                            <div class="row justify-content-center">
                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <div class="avatar mb-4 mb-xl-0" style="background-image: url({{$review->hasMedia('review')? $review->getFirstMedia('review')->getFullUrl() : 'images/no-image.png'}})"></div>
                                </div>
                                <div class="col-lg col-xxl d-flex flex-column justify-content-center">
                                    <div class="text">{!! $review->content->body!!}</div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <p class="date">{{ $review->created_at->formatLocalized('%d %B %Y') }}</p>
                                        @if($review->facebook)
                                        <a href="{{$review->facebook}}" class="name d-flex align-items-center">
                                            <svg width="15" height="15">
                                                <use xlink:href="#fb-icon"></use>
                                            </svg>
                                            {{$review->title}}
                                        </a>
                                        @else
                                            {{$review->title}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="row align-items-center mt-xx-5 justify-content-center">
                        <div class="col-sm-6 col-xl-5">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="texting-slider-nav d-flex">
                                    <div class="texting-arrow texting-arrow--left">
                                        <svg width="9" height="15">
                                            <use xlink:href="#arrow-left"></use>
                                        </svg>
                                    </div>
                                    <div class="texting-arrow texting-arrow--right">
                                        <svg width="9" height="15">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="texting-slider-counter d-flex">
                                    <p id="texting-active" class="active-count">01</p>
                                    <p id="texting-active-all"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{route('app.reviews.index')}}" class="btn btn-secondary w-100 my-5 my-sm-2"><span>@lang('common.main.read_reviews')</span></a>
                        </div>
                    </div>
                </div>
            </div>
            @if($reviews_video)
            <div class="col-xl-6 order-xl-1">
                <div class="video-feedback" data-youtube="{{$reviews_video->video}}"></div>
            </div>
                @endif
        </div>

        <a href="#" class="appointment d-flex flex-column align-items-center justify-content-center modal-btn" style="background-image: url(../images/appointment-bg.jpg)">
            <h2 class="appointment__title">@lang('common.feedback.title')</h2>
            <p class="appointment__text">@lang('common.feedback.description')</p>
            <p class="appointment__link mt-4">
                @lang('common.feedback.btn')
                <svg width="20" height="6">
                    <use xlink:href="#arrow-link"></use>
                </svg>
            </p>
        </a>
    </div>
</section>
