<div class="menu">

    <div class="close-menu">
        <svg width="20" height="20">
            <use xlink:href="#close-icon"></use>
        </svg>
        @lang('common.menu.close')
    </div>

    <div class="menu-content">
        <div class="container-fluid">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-sm-10 col-md-8 col-lg-3 col-xl-auto col-sm-6">
                    <div class="menu-item">
                        <a href="/" class="menu-item__title">@lang('common.menu.main')</a>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-3 col-xl-auto col-sm-6">
                    <div class="menu-item">
                        <a href="{{ url('/about') }}" class="menu-item__title">@lang('common.menu.about')</a>

                        <ul class="menu-item__list">
                            <li>
                                <a href="{{ url('/reviews') }}"
                                   class="list-link">@lang('common.menu.review')</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-3 col-xl-auto col-sm-6">
                    <div class="menu-item">
                        <div class="menu-item__title">@lang('common.menu.direction')</div>
                        <ul class="menu-item__list">
                            @foreach(app('categories')->where('thread', 'directions')->where('published', 1)  as $direction)
                                @if($direction->directions->where('published', 1)->count())
                                    <li>
                                        <a href="#" class="list-link menu-drop-btn">
                                            {{$direction->title}}
                                            <svg width="7" height="12">
                                                <use xlink:href="#arrow-right"></use>
                                            </svg>
                                        </a>

                                        <div class="menu-drop">
                                            <div class="row align-items-center">
                                                <div class="col-xl-4">
                                                    <h2 class="menu-drop__title">{{$direction->title}}</h2>
                                                </div>
                                                <div class="col">
                                                    <div class="drop-slider drop-slider--minlenght">
                                                        @foreach($direction->directions->where('published', 1) as $post)
                                                            <a href="{{route('app.directions.show', $post)}}"
                                                               class="drop-slider__item">
                                                                <div class="content">
                                                                    <div class="content__img"
                                                                         style="background-image: url({{$post->hasMedia('direction') ?
                                                                $post->getFirstMedia('direction')->getFullUrl() : "/images/no-image.png"}})"></div>
                                                                    <h3 class="content__title">{{$post->title}}</h3>
                                                                </div>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    @else
                                    <div class="list-link-noactive">
                                        {{$direction->title}}
                                    </div>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-3 col-xl-auto col-sm-6">
                    <div class="menu-item">
                        <a href="{{ route('app.articles.index') }}"
                           class="menu-item__title">@lang('common.menu.blog')</a>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-3 col-xl-auto col-sm-6">
                    <div class="menu-item">
                        <a href="{{ url('/faq') }}"
                           class="menu-item__title">@lang('common.menu.questions')</a>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-3 col-xl-auto col-sm-6">
                    <div class="menu-item">
                        <a href="{{ url('/contacts') }}"
                           class="menu-item__title">@lang('common.menu.contacts')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
