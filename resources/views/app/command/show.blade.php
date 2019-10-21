@extends('layouts.app', ['page_title' => $command->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">@lang('common.main.team') / {{ $command->title }}</li>
        </ul>
    </section>
    <section class="article-section">

        <div class="container-fluid">
            <div class="row justify-content-center justify-content-xl-end">

                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 offset-xxl-1 order-xl-2 mb-4 mb-xl-0">
                    <div class="about-galery">
                        <div class="about-slider">
                            @foreach($command->getMedia('command') as $img)
                                <div class="about-slider__item"
                                     style="background-image: url({{$img->getFullUrl()}})"></div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 col-xxl-5 mt-5 order-xl-1">

                    <div class="section-decor section-decor--article">
                        <img src="../images/about-img.svg" alt="">
                    </div>

                    <div class="about">
                        <h2 class="mb-4">{{$command->title}}</h2>

                        <h3 class="mb-4">{{$command->content->description}}</h3>
                        <div class="about-text">
                            {!! $command->content->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeWhen($methods->count(), 'partials.app.sections.methods')
    @include('partials.app.sections.contacts')
    @endsection