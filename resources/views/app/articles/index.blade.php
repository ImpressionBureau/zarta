@extends('layouts.app', ['page_title' => trans('breadcrumb.blog')])
@section('content')
    <section class="bradcrumbs-section">
        <ul class="bcrumb">
            <li class="bcrumb__item"><a href="/">@lang('breadcrumb.main')</a></li>
            <li class="bcrumb__item bcrumb__item--active">@lang('breadcrumb.blog')</li>
        </ul>
    </section>
    <section class="intro-other-section" style="background-image: url(images/other-intro.jpg)">
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
                    @foreach($articles as $article)
                        <div class="col-xxl-3 col-md-6 col-lg-4">
                            <div class="article">
                                <a href="{{ route('app.articles.show', $article) }}" class="article__img"
                                   style="background-image: url({{ $article->hasMedia('uploads')? $article->getFirstMedia('uploads')->getFullUrl() : 'images/no-image.png'}})"></a>
                                <div class="article__content">
                                    <p class="date d-flex">
                                        <svg width="10" height="10">
                                            <use xlink:href="#date-icon"></use>
                                        </svg>
                                        {{$article->created_at->formatLocalized('%d %B %Y')}}
                                    </p>

                                    <h3 class="title">{{$article->title}}</h3>

                                    <p class="text">{!!  remove_tags($article->content->body)!!}</p>

                                    <a href="{{ route('app.articles.show', $article) }}" class="link">
                                        @lang('common.articles.read')
                                        <svg width="20" height="6">
                                            <use xlink:href="#arrow-link"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="align-items-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>

    </section>
    @include('partials.app.sections.contacts')
@endsection