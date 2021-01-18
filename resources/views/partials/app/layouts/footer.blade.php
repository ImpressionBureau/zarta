<footer>
    <div class="footer-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-xxl">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-xl">
                    <div class="footer-list d-flex flex-column">
                        <a href="/">@lang('common.footer.main')</a>
                        <a href="{{ route('app.pages.about') }}">@lang('common.footer.about')</a>
                        <a href="{{ route('app.directions.index') }}">@lang('common.footer.direction')</a>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="footer-list d-flex flex-column">
                        <a href="{{route('app.services.index')}}">@lang('common.footer.services')</a>
                        <a href="{{ route('app.faq.index') }}">@lang('common.footer.questions')</a>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="footer-list d-flex flex-column">
                        <a href="{{ route('app.articles.index') }}">@lang('common.footer.blog')</a>
                        <a href="{{route('app.pages.contacts')}}">@lang('common.footer.contacts')</a>
                    </div>
                </div>
                {{--<div class="col-xl-3 col-xxl">
                    <form action="{{route('app.subscribe')}}" method="post" class="footer-form">
                        @csrf
                        <p class="footer-form__subtitle">@lang('common.subscribe.title')</p>
                        <div class="field">
                            <label for="fid2">Email</label>
                            <input id="fid2" type="email" name="subscribe-email" class="field__item">
                        </div>
                        <button class="btn btn-primary mt-3"><span>@lang('common.subscribe.btn')</span></button>
                    </form>
                </div>--}}
            </div>
        </div>
    </div>

    <div class="footer-dev text-white">
        <div class="footer-dev__item small">
            ©{{ date('Y') }} @lang('common.footer.copy')
        </div>
        <div class="footer-dev__item">
            <div class="footer-social d-flex align-items-center justify-content-around">
                <a href="{{app('settings')->facebook}}">FACEBOOK</a>
                <a href="{{app('settings')->instagram}}">INSTAGRAM</a>
                <a href="{{app('settings')->youtube}}">YOUTUBE</a>
            </div>
        </div>
{{--        <div class="footer-dev__item text-xl-right">--}}
{{--            <a href="https://impressionbureau.pro">@lang('common.footer.dev') <span>Impression Bureau</span></a>--}}
{{--        </div>--}}
    </div>
</footer>
