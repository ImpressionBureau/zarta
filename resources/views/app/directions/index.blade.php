@extends('layouts.app', ['page_title' => trans('breadcrumb.directions')])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">@lang('breadcrumb.directions')</li>
        </ul>
    </section>

    <section class="category-content-section mb-4">
        <div class="container">
            <div class="row mb-n3">
                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4 mb-3 d-flex flex-column justify-content-center">
                        <a href="{{route('app.directions.show', $category)}}" class="areas-item p-0 lozad"
                           data-background-image="{{$category->getFirstMediaUrl('category', 'preview')}}">
                            <div class="areas-item__content">
                                <h6 class="title">{{ $category->title }}</h6>
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
