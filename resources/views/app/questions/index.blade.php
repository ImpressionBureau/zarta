@extends('layouts.app', ['page_title' => $page->title ])
@section('content')
    <section class="intro-other-section" style="background-image: url({{$page->getFirstMedia('page')->getFullUrl()}})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2 class="section-title-center section-title--other mb-5">
                        <span>{{ $page->title }}</span>
                    </h2>
                    <p class="intro-other-text">{{$page->content->description}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="acordion-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    @foreach($questions as $question)
                    <div class="acordion">
                        <div class="acordion__btn">
                            <h4 class="title">{{$question->title}}</h4>
                            <div class="icon">
                                <svg width="20" height="20">
                                    <use xlink:href="#plus-icon"></use>
                                </svg>
                            </div>
                        </div>

                        <div class="acordion__content">
                            <p>{!! $question->content->body !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@include('partials.app.layouts.form')
@endsection