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
                                <a href="#" class="areas-item"
                                   style="background-image: url({{$direction->getFirstMedia('direction')->getFullUrl()}})">
                                    <div class="areas-item__content">
                                        <p class="title">{{ $direction->title }}</p>
                                        <ul class="list">
                                            {!! $direction->content->navigation !!}
                                        </ul>
                                    </div>
                                </a>
                                @if(($loop->iteration %2) == 0 || $loop->last)
                            </div>
                        @endif
                    @endforeach


                  {{--  <div class="areas-col">
                        <a href="#" class="areas-item"
                           style="background-image: url(../images/work-areas/area-img5.jpg)">
                            <div class="areas-item__content">
                                <p class="title">Захворювання суглобiв</p>
                                <ul class="list">
                                    <li>Артроз</li>
                                    <li>Контрактура</li>
                                    <li>Нестабільність в колінному суглобі
                                    </li>
                                    <li>Нестабільність в плечовому суглобі</li>
                                    <li>Плечелопатковий периартрит</li>
                                    <li>Адгезивний капсуліт</li>
                                    <li>Субакроміальний імпіджмент</li>
                                    <li>Епікондиліт</li>
                                    <li>Синдром Зудека</li>
                                    <li>Трохантерит</li>
                                    <li>...</li>
                                </ul>
                            </div>
                        </a>
                        <a href="#" class="areas-item"
                           style="background-image: url(../images/work-areas/area-img6.jpg)">
                            <div class="areas-item__content">
                                <p class="title">Захворювання суглобiв</p>
                                <ul class="list">
                                    <li>Артроз</li>
                                    <li>Контрактура</li>
                                    <li>Плечелопатковий периартрит</li>
                                    <li>...</li>
                                </ul>
                            </div>
                        </a>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>