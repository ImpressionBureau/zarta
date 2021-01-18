@extends('layouts.app', ['page_title' => $direction->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.methods.index')}}">@lang('breadcrumb.methods')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$direction->title}}</li>
        </ul>
    </section>

    <section class="category-content-section">
        <div class="container">
            <h2 class="section-title-center mb-5">
                <span>{{$direction->title}}</span>
            </h2>
            <div class="cat-content">
                {!! optional($direction->content)->body ?? '' !!}
            </div>
        </div>
    </section>

    @includeWhen($direction->categories->count(), 'partials.app.sections.directions', ['departments' => $direction->categories])
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection
