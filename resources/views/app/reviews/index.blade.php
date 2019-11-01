@extends('layouts.app', ['page_title' => $page->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$page->title}}</li>
        </ul>
    </section>
    <section class="intro-other-section" style="background-image: url({{$page->getFirstMediaUrl('page')}})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2 class="section-title-center section-title--other mb-5">
                        <span>{{$page->title}}</span>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section class="feedback-page-section">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center">
                <div class="col-6 col-xl-auto">
                    <a href="#" class="tab-nav" data-target="feedback-video-page">@lang('common.reviews.video')</a>
                </div>
                <div class="col-6 col-xl-auto">
                    <a href="#" class="tab-nav" data-target="feedback-text-page">@lang('common.reviews.text')</a>
                </div>
            </div>

            <div id="feedback-video-page" class="tab-content">
                <div class="row">
                    @if($reviews_video->count())
                        @foreach($reviews_video as $video)
                            <div class="col-sm-6 col-md-4 col-xl-6 mb-4">
                                <div class="video-feedback" data-youtube="{{$video->video}}"></div>
                            </div>
                        @endforeach
                    @else
                        <p class="ml-3">@lang('common.reviews.not')</p>
                    @endif
                </div>
            </div>

            <div id="feedback-text-page" class="tab-content">
                <div class="row">
                    @if($reviews->count())
                        @foreach($reviews as $review)
                            <div class="col-md-6">
                                <div class="texting-slider__item text-feedback-page">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-8 col-md-6 col-lg-4 col-xl-5 col-xxl-5">
                                            <div class="avatar mb-4 mb-xl-0"
                                                 style="background-image: url({{$review->hasMedia('review')? $review->getFirstMedia('review')->getFullUrl() : 'images/no-image.png'}})"></div>
                                        </div>
                                        <div class="col-lg col-xl-12 col-xxl d-flex flex-column justify-content-center">
                                            <div class="text">{!! $review->content->body !!}</div>
                                            <div class="d-flex align-items-center justify-content-between pt-3">
                                                <p class="date">{{ $review->created_at->formatLocalized('%d %B %Y') }}</p>
                                                @if($review->facebook)
                                                    <a href="{{$review->facebook}}"
                                                       class="name d-flex align-items-center">
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
                            </div>
                        @endforeach
                    @else
                        <p class="ml-3">@lang('common.reviews.not')</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection