@extends('layouts.app', ['page_title' => trans('breadcrumb.main')])

@section('content')
    @include('partials.app.sections.intro')
    @includeWhen($directions->count(), 'partials.app.sections.directions')
    @includeWhen($pages->count(), 'partials.app.sections.pages')
    @includeWhen($team->count(),'partials.app.sections.team')
    @includeWhen($reviews->count(), 'partials.app.sections.reviews')
    @includeWhen($about->count(), 'partials.app.sections.about')
    @include('partials.app.sections.contacts')


@endsection