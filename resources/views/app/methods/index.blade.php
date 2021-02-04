@extends('layouts.app', ['page_title' => trans('common.menu.services')])

@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">@lang('common.menu.services')</li>
        </ul>
    </section>

    @include('partials.app.sections.methods')
    @includeWhen($team->count(), 'partials.app.sections.team', ['classes' => 'p-lg-0'])
    @include('partials.app.layouts.form', ['classes' => 'mt-0'])
    @include('partials.app.sections.contacts')
@endsection
