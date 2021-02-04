@extends('layouts.app', ['page_title' => $page->title])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">{{$page->title}}</li>
        </ul>
    </section>

    <section class="intro-other-section" style="background-image: url({{$page->getFirstMediaUrl('page')}})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h1 class="section-title-center section-title--other mb-5">
                        <span>{{$page->title}}</span>
                    </h1>
                </div>
            </div>
        </div>
    </section>
@include('partials.app.sections.contacts')
@endsection
