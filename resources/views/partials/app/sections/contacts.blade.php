<section class="contact-section">
    <div class="container-fluid">
        <div class="row align-items-center no-gutters">
            <div class="col-xl-4">
                <div class="contact">
                    <h3 class="contact__title mb-5">@lang('common.contacts.title')</h3>

                    <div class="contact__item">
                        <h4>@lang('common.contacts.address')</h4>
                        <p>{{app('settings')->content->address}}</p>
                    </div>
                    <div class="contact__item">
                        <h4>@lang('common.contacts.phone')</h4>
                        <div class="d-inline-flex flex-column align-items-end flex-grow-1">
                            <a href="tel:{{phone_link(app('settings')->phone)}}">{{app('settings')->phone}}</a>
                            <a href="tel:{{phone_link(app('settings')->phone_additional)}}">{{app('settings')->phone_additional}}</a>
                        </div>
                    </div>
                    <div class="contact__item">
                        <h4>Email</h4>
                        <div class="d-inline-flex justify-content-end flex-grow-1">
                            <a href="mailto:{{app('settings')->email}}">{{app('settings')->email}}</a>
                        </div>
                    </div>
                    <div class="contact__item">
                        <h4>@lang('common.contacts.work_time')</h4>
                        <p>{{app('settings')->content->work_time}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div id="map" class="map" data-long="{{app('settings')->latitude}}" data-lat="{{app('settings')->longitude}}" data-icon="../images/map-pin.png">
                    <div class="map__bg">
                        <h3>@lang('common.contacts.map')</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
