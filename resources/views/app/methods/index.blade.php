@extends('layouts.app', ['page_title' => $method->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.methods.index')}}">@lang('breadcrumb.methods')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$method->title}}</li>
        </ul>
    </section>

    <section class="category-content-section">
        <div class="container">
            <h2 class="section-title-center mb-5">
                <span>{{$method->title}}</span>
            </h2>
            <div class="cat-content">
                {!! $method->content->body!!}
            </div>
        </div>
    </section>

    @includeWhen($method->categories->count(), 'partials.app.sections.directions', ['departments' => $method->categories])
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection
