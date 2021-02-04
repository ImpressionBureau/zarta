<div class="menu">
    <div class="menu-content">
        <nav>
            <ul class="list-unstyled m-0">
                <li class="nav-item">
                    <a href="/" class="nav-link">@lang('common.menu.main')</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link">@lang('common.menu.about')</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/reviews') }}" class="nav-link">@lang('common.menu.review')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#directions" aria-expanded="false"
                       aria-controls="directions">
                        @lang('common.menu.direction')
                    </a>

                    <div class="collapse" id="directions">
                        <ul class="smaller pl-2">
                            @foreach($departments as $direction)
                                <li class="nav-link">
                                    <a href="{{route('app.directions.show', $direction)}}" class="nav-item">
                                        {{ $direction->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('app.articles.index') }}" class="nav-link">@lang('common.menu.blog')</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/faq') }}" class="nav-link">@lang('common.menu.questions')</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contacts') }}" class="nav-link">@lang('common.menu.contacts')</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
