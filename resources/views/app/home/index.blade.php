@extends('layouts.app', ['page_title' => trans('breadcrumb.main')])

@section('content')
    @include('partials.app.sections.intro')
    @includeWhen($directions->count(), 'partials.app.sections.directions')
    @includeWhen($pages->count(), 'partials.app.sections.pages')
    @includeWhen($team->count(),'partials.app.sections.team')


@endsection