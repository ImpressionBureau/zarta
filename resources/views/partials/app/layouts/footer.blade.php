<footer>
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3">
                    <a href="/" class="footer-logo">
                        <img src="/images/logo.png" alt="">
                    </a>
                </div>
                <div class="col">
                    <div class="footer-list d-flex flex-column">
                        <a href="/">@lang('common.footer.main')</a>
                        <a href="{{ route('app.pages.about') }}">@lang('common.footer.about')</a>
                        <a href="#">@lang('common.footer.direction')</a>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-list d-flex flex-column">
                        <a href="#">@lang('common.footer.methods')</a>
                        <a href="{{route('app.services.index')}}">@lang('common.footer.services')</a>
                        <a href="{{ route('app.faq.index') }}">@lang('common.footer.questions')</a>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-list d-flex flex-column">
                        <a href="{{ route('app.articles.index') }}">@lang('common.footer.blog')</a>
                        <a href="{{route('app.pages.contacts')}}">@lang('common.footer.contacts')</a>
                    </div>
                </div>
                <div class="col-xl-2">
                    .
                </div>
            </div>
        </div>
    </div>

    <div class="footer-dev">
        <div class="footer-dev__item">
            <p>© Copyright 2018, @lang('common.footer.copy')</p>
        </div>
        <div class="footer-dev__item">
            <div class="footer-social d-flex align-items-center justify-content-around">
                <a href="{{app('settings')->facebook}}">FACEBOOK</a>
                <a href="{{app('settings')->instagram}}">INSTAGRAM</a>
                <a href="{{app('settings')->youtube}}">YOUTUBE</a>
            </div>
        </div>
        <div class="footer-dev__item text-right">
            <a href="https://impressionbureau.pro">@lang('common.footer.dev') <span>Impression Bureau</span></a>
        </div>
    </div>
</footer>
