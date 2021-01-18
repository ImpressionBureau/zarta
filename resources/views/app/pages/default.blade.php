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
                    <h2 class="section-title-center section-title--other mb-0">
                        <span>{{$page->title}}</span>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    @isset ($page->content->body)
    <section class="container py-3 py-lg-5">
        <div class="col-xl-8 mx-auto">
            {!! optional($page->content)->body !!}
        </div>
    </section>
    @endisset
    @include('partials.app.sections.contacts')
@endsection
