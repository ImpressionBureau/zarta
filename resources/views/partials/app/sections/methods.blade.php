<section class="therapy-methods-section">
    <div class="container">
        <div class="row no-gutters">
            @foreach($methods as $method)
                @if($loop->index % 2 == 0)
                    <div class="col-sm-6 col-xl-4 px-2">
                        @endif
                        <a href="{{ route('app.methods.show', $method) }}" class="d-block">
                            <div class="method lozad"
                                 data-background-image="{{ $method->getFirstMediaUrl('method', 'preview') }}">
                                <div class="method__circle d-none d-lg-block"></div>
                                <div class="method__item">
                                    <div class="img"></div>
                                    <h3 class="title">{{ $method->title }}</h3>
                                </div>
                            </div>
                        </a>
                        @if($loop->index % 2 != 0)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
