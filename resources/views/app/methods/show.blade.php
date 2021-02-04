@extends('layouts.app', ['page_title' => $direction->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.methods.index')}}">@lang('breadcrumb.methods')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$direction->title}}</li>
        </ul>
    </section>

    <section class="container pb-4">
        <h1 class="section-title-center mb-5">
            <span>{{$direction->title}}</span>
        </h1>
        <div class="content">
            {!! optional($direction->content)->body ?? '' !!}
        </div>
    </section>

    @includeWhen($direction->categories->count(), 'partials.app.sections.directions', ['departments' => $direction->categories])
    @include('partials.app.layouts.form', ['classes' => 'mt-0'])
    @include('partials.app.sections.contacts')
@endsection
