@extends('layouts.app', ['page_title' => $service->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item"><a href="{{route('app.services.index')}}">@lang('breadcrumb.service')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$service->title}}</li>
        </ul>
    </section>

    <section class="container pb-4">
        <h1 class="section-title-center mb-5">
            <span>{{$service->title}}</span>
        </h1>
        <div class="content">
            {!! optional($service->content)->body ?? '' !!}
        </div>
    </section>

    @include('partials.app.layouts.form', ['type' => \App\Models\Service::class, 'model' => $service->id, 'classes' => 'mt-0'])
    @include('partials.app.sections.contacts')
@endsection
