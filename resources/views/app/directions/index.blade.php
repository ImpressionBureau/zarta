@extends('layouts.app', ['page_title' => trans('breadcrumb.directions')])
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
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{route('app.directions.show', $category)}}" class="areas-item lozad"
                           data-background-image="{{$category->getFirstMediaUrl('category', 'preview')}}">
                            <div class="areas-item__content">
                                <p class="title">{{ $category->title }}</p>
                                <div class="content">
                                    {!! remove_tags_direction($category->content->description) !!}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @includeWhen($team->count(), 'partials.app.sections.team')
    @includeWhen($category->directions->count(), 'partials.app.sections.methods')
    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection
