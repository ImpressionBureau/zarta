@extends('layouts.app', ['page_title' => trans('breadcrumb.service')])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">@lang('breadcrumb.service')</li>
        </ul>
    </section>

    <section class="price-section">
        <div class="container">
            <h1 class="section-title-center mb-5">
                <span>@lang('breadcrumb.service')</span>
            </h1>

            <div class="row justify-content-center mb-n3">
                @if($services->count())
                    @foreach($services as $service)
                        <div class="col-sm-8 col-md-6 col-xl-4 mb-3">
                            <a href="{{ route('app.services.show', $service) }}" id="service-{{ $service->id }}" class="price d-flex align-items-center justify-content-center">
                                <h4 class="price__title">{{ $service->title }}</h4>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h2 class="section-title-center mb-5">
                        <span class="mb-5">@lang('common.service.message')</span>
                    </h2>
                @endif
            </div>
        </div>
    </section>

    @include('partials.app.layouts.form')
    @include('partials.app.sections.contacts')
@endsection
