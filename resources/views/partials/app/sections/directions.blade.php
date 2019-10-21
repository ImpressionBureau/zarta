<section class="work-areas-section">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-end">
            <div class="col-xl-auto">
                <div class="areas-title">
                    <h2 class="title">@lang('common.main.direction')</h2>
                </div>
            </div>
            <div class="col-xl">
                <div class="areas-row d-flex align-items-center justify-content-center">
                    @foreach($directions as $direction)

                        @if(($loop->iteration %2) != 0)
                            <div class="areas-col">
                                @endif
                                <a href="{{route('app.directions.show', $direction)}}" class="areas-item"
                                   style="background-image: url({{$direction->getFirstMedia('direction')->getFullUrl()}})">
                                    <div class="areas-item__content">
                                        <p class="title">{{ $direction->title }}</p>
                                        <ul class="list">
                                            @if(($loop->index == 1) && ($loop->index == 2) && ($loop->index == 5))
                                                {!! remove_tags_direction($direction->content->navigation) !!}
                                            @else
                                                {!! $direction->content->navigation !!}
                                            @endif
                                        </ul>
                                    </div>
                                </a>
                                @if(($loop->iteration %2) == 0 || $loop->last)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>