@extends('layouts.app', ['page_title' => trans('breadcrumb.directions')])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.directions.index')}}">@lang('breadcrumb.directions')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$article->title}}</li>
        </ul>
    </section>
    <section class="navigation-section">
        <div class="container">
            <h2 class="section-title-center ">
                <span>{{$category->title}}</span>
            </h2>
            <div class="navigation">
                <div class="navigation-slider">
                    @foreach($articles as $item)
                    <a href="{{route('app.directions.show', $item)}}" class="navigation-slider__item">
                        <div class="content">
                            <div class="content__img" style="background-image: url({{$item->getFirstMediaUrl('direction')}})"></div>
                            <h3 class="content__title">{{$item->title}}</h3>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="category-content-section">
        <div class="container">

            <h2 class="section-title-center mb-5">
                <span>{{$article->title}}</span>
            </h2>

            <div class="row">
                @if($article->content->navigation)
                    <div class="col order-xl-4 col-xxl-2">
                        <div class="cat-content-nav">
                            <h4 class="title">@lang('common.navigation')</h4>
                            {!!  $article->content->navigation!!}
                        </div>
                    </div>
                    <div class="col-xl-8 col-xxl-9 order-xl-1">
                        <div class="cat-content">
                            {!! $article->content->body!!}
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="cat-content">
                            {!! $article->content->body!!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @includeWhen($methods->count(), 'partials.app.sections.methods')
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection