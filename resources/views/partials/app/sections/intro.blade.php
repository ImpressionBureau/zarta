<section class="intro-section d-flex flex-column align-items-center justify-content-center" style="background-image: url({{app('settings')->getFirstMedia('banner')->getFullUrl()}})">
    <div class="intro d-flex flex-column align-items-center justify-content-center">
        <a href="/" class="intro__logo">
            <img src="/images/logo.png" alt="">
        </a>
        <p class="intro__text">{{app('settings')->title}}</p>
    </div>

    <p class="intro-label">@lang('common.main.label')</p>

    <div class="intro-scroll">
        <p>@lang('common.main.appointments')</p>
    </div>

    <header class="header header--front">
        <div class="nav-btn d-inline-flex align-items-center">
            <svg class="nav-btn__icon" width="24" height="24">
                <use xlink:href="#nav-btn-icon"></use>
            </svg>
            <p class="nav-btn__title">@lang('common.header.menu')</p>
        </div>
        <a href="/" class="header-logo">
            <img src="/images/logo.png" alt="">
        </a>

        <div class="language">
            <a href="#" class="language__active d-flex align-items-center justify-content-center">RU</a>

            <ul class="language__list">
                <li>
                    <a href="#">EN</a>
                </li>
                <li>
                    <a href="#">RU</a>
                </li>
                <li>
                    <a href="#">UA</a>
                </li>
            </ul>
        </div>

        <div class="header-contacts ml-auto d-flex align-items-center justify-content-center">
            <a href="#" class="header-contacts__item d-inline-flex align-items-center">
                <svg class="img" width="15" height="15">
                    <use xlink:href="#pin-icon"></use>
                </svg>
                {{app('settings')->content->address}}
            </a>
            <a href="#" class="header-contacts__item d-inline-flex align-items-center">
                <svg class="img" width="15" height="15">
                    <use xlink:href="#phone-icon"></use>
                </svg>
                {{app('settings')->phone}}
            </a>
            <a href="#" class="header-contacts__item d-inline-flex align-items-center">
                <svg class="img" width="15" height="15">
                    <use xlink:href="#phone-icon"></use>
                </svg>
                {{app('settings')->phone_additional}}
            </a>
        </div>

        <a href="#" class="btn btn-primary"><span>@lang('common.main.appointments')</span></a>
    </header>

</section>