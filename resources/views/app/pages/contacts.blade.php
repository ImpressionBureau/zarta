@extends('layouts.app', ['page_title' => trans('breadcrumb.contacts')])
@section('content')
    <section class="intro-other-section" style="background-image: url(../images/other-intro.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2 class="section-title-center section-title--other mb-5">
                        <span>@lang('common.menu.contacts')</span>
                    </h2>
                </div>
            </div>
        </div>
    </section>
@include('partials.app.sections.contacts')

@endsection