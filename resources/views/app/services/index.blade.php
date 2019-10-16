@extends('layouts.app', ['page_title' => trans('breadcrumb.service')])
@section('content')

    <section class="intro-other-section" style="background-image: url({{$page->getFirstMediaUrl('page')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2 class="section-title-center section-title--other mb-5">
                        <span>@lang('breadcrumb.service')</span>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section class="navigation-section">
        <div class="container">
            <div class="navigation">
                <div class="navigation-slider">
                    @foreach($categories as $category)
                        <a href="?category={{ $category->slug }}" class="navigation-slider__item">
                            <div class="content">
                                <div class="content__img"
                                     style="background-image: url({{$category->getFirstMediaUrl('category')}})"></div>
                                <h3 class="content__title">{{$category->title}}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="price-section">
        <div class="container">

            @if($cat)
            <h2 class="section-title-center mb-5">
                <span>{{$cat->title}}</span>
            </h2>
            @endif

            <div class="row justify-content-center">

                @foreach($services as $service)
                <div class="col-sm-8 col-md-6 col-xl-4">
                    <div id="{{$service->id}}" class="price">
                        <h4 class="price__title">{{$service->title}}</h4>

                        <div class="price-footer d-flex justify-content-end align-items-center">
                            <div class="price-footer__value">@lang('common.service.price') <span class="value">{{$service->price}}</span>@lang('common.service.currency')</div>
                            <a href="#" class="btn btn-primary btn--short btn--price"><span>@lang('common.service.btn')</span></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection