<form action="{{ route('app.locale') }}" method="post" id="locale" style="display: none">
    @csrf
    <input type="hidden" name="locale">
</form>
<section class="intro-section d-flex flex-column align-items-center justify-content-center">

    <div class="intro-slider-wrap">
        <div class="intro-slider">
            @foreach(app('settings')->getMedia('banner') as $item)
                <div class="intro-slider__item lozad" data-background-image="{{$item->getFullUrl('preview')}}"></div>
            @endforeach
        </div>
        @if(app('settings')->getMedia('banner')->count() > 1)
            <div class="intro-arrow intro-arrow--prev">
                <svg width="13" height="21">
                    <use xlink:href="#arrow-left"></use>
                </svg>
            </div>
            <div class="intro-arrow intro-arrow--next">
                <svg width="13" height="21">
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </div>
        @endif
    </div>

    <div class="intro d-flex flex-column align-items-center justify-content-center">
        <a href="{{ url('/') }}" class="intro__logo d-none d-lg-flex mb-3">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <p class="intro__text">{{app('settings')->title}}</p>
    </div>

    <p class="intro-label">@lang('common.main.label')</p>

    <a href="#" class="intro-scroll anchor modal-btn">
        <p>@lang('common.main.appointments')</p>
    </a>

    <header class="header header--front">
        <div class="nav-btn d-inline-flex align-items-center  justify-content-center">
            <svg class="nav-btn__icon" width="24" height="24">
                <use xlink:href="#nav-btn-icon"></use>
            </svg>
            <p class="nav-btn__title d-none d-xl-block">@lang('common.header.menu')</p>
        </div>
        <a href="/" class="header-logo">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
        </a>

        <div class="language d-none d-xl-block">
            <a href="#" class="language__active d-flex align-items-center justify-content-center text-uppercase">
                @if(app()->getLocale() == 'uk' )
                    UA
                @else
                    {{ app()->getLocale() }}
                @endif
            </a>

            <ul class="language__list">
                @foreach($locales as $locale)
                    <li>
                        <a href="#{{ $locale }}" class="locales">
                            @if ($locale == 'uk')
                                UA
                            @else
                                {{ $locale }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="header-contacts ml-auto d-none d-xl-flex align-items-center justify-content-center">
            <a href="#map" class="header-contacts__item d-inline-flex align-items-center">
                <svg class="img" width="15" height="15">
                    <use xlink:href="#pin-icon"></use>
                </svg>
                {{app('settings')->content->address}}
            </a>
            <a href="tel:{{phone_link(app('settings')->phone)}}"
               class="header-contacts__item d-inline-flex align-items-center">
                <svg class="img" width="15" height="15">
                    <use xlink:href="#phone-icon"></use>
                </svg>
                {{app('settings')->phone}}
            </a>
            <a href="tel:{{phone_link(app('settings')->phone_additional)}}"
               class="header-contacts__item d-inline-flex align-items-center">
                <svg class="img" width="15" height="15">
                    <use xlink:href="#phone-icon"></use>
                </svg>
                {{app('settings')->phone_additional}}
            </a>
        </div>

        <a href="#" class="btn btn-primary btn--short modal-btn"><span>@lang('common.main.appointments')</span></a>
        @include('partials.app.layouts.appointments-form')
    </header>

</section>
