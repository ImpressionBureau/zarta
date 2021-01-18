@extends('layouts.app', ['page_title' => $category->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.directions.index')}}">@lang('breadcrumb.directions')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{ $category->title }}</li>
        </ul>
    </section>

    <section class="category-content-section mb-4">
        <div class="container">
            <h2 class="section-title-center mb-5">
                <span>{{ $category->title }}</span>
            </h2>
            <div class="col-lg-9 mx-auto">{!! optional($category->content)->body!!}</div>
        </div>
    </section>

    @includeWhen($team->count(), 'partials.app.sections.team', ['classes' => 'p-lg-0'])
    @includeWhen($category->directions->count(), 'partials.app.sections.methods')
    @include('partials.app.layouts.form', ['classes' => 'mt-0'])
    @include('partials.app.sections.contacts')
@endsection
