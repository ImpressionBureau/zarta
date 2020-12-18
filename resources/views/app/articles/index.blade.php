@extends('layouts.app', ['page_title' => trans('breadcrumb.blog')])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">@lang('breadcrumb.blog')</li>
        </ul>
    </section>

    <section class="intro-other-section" style="background-image: url('{{ asset('images/other-intro.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2 class="section-title-center section-title--other mb-5">
                        <span>@lang('common.menu.blog')</span>
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section">
        <div class="blog-content">
            <div class="container">
                <div class="row no-gutters">
                    @each('partials.app.blog.article', $articles, 'article')
                </div>
                <div class="d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </section>

    @include('partials.app.sections.contacts')
@endsection
