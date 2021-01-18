@extends('layouts.app', ['page_title' => $article->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.articles.index')}}">@lang('breadcrumb.blog')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$article->title}}</li>

        </ul>
    </section>
    <section class="article-section">

        <div class="container-fluid">
            <div class="row justify-content-center justify-content-xl-end">

                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 offset-xxl-1 order-xl-2 mb-4 mb-xl-0">
                    <div class="about-galery">
                        <div class="about-slider">
                            @foreach($article->getMedia('uploads') as $img)
                                <div class="about-slider__item"
                                     style="background-image: url({{$img->getFullUrl('preview')}})"></div>
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

                <div class="col-xl-7 col-xxl-5 mt-5 order-xl-1">

                    <div class="section-decor section-decor--article">
                        <img src="{{ asset('images/about-img.svg') }}" alt="">
                    </div>

                    <div class="about">
                        <h2 class="mb-4">{{$article->title}}</h2>
                        <div class="about-text">
                            {!! $article->content->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeWhen($methods->count(), 'partials.app.sections.methods')
    @include('partials.app.sections.contacts')
@endsection
