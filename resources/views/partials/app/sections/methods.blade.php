<section class="therapy-methods-section">

    <div class="container">

        <div class="row no-gutters">
            @foreach($methods as $method)
                @if($loop->index%2 ==0)
                    <div class="col-sm-6 col-xl-6 px-2">
                        @endif
                        @if($loop->first)
                            <h2 class="section-title mb-5 therapy-method__title">@lang('common.menu.method')</h2>
                        @endif
                        <a href="{{route('app.methods.show', $method)}}">
                        <div class="method">
                            <div class="method__circle d-none d-md-block"></div>
                            <div class="method__item">
                                <div class="img" style="background-image: url({{$method->getFirstMediaUrl('method')}})"></div>
                                <h3 class="title">{{$method->title}}</h3>
                            </div>
                            <div class="method__item">
                                <ul class="list">
                                    {!! $method->content->navigation !!}
                                </ul>
                            </div>
                        </div>
                        </a>
                        @if($loop->index%2 !=0)
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</section>