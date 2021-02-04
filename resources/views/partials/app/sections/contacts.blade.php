<section id="map" class="contact-section">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center no-gutters">
            <div class="col-12 col-sm-8 col-md-6 col-xl-4">
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
                            @if (app('settings')->phone_additional_2)
                            <a href="tel:{{phone_link(app('settings')->phone_additional_2)}}">{{app('settings')->phone_additional_2}}</a>
                            @endif
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
            <div class="col-12 col-xl">
                <div id="contact-map" class="map" data-long="{{app('settings')->latitude}}" data-lat="{{app('settings')->longitude}}" data-icon="{{ asset('images/map-pin.png') }}">
                    <div class="map__bg">
                        <h3>@lang('common.contacts.map')</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet'/>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js' defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const customMap = document.querySelector('#contact-map');
            const mapBg = document.querySelector('.map__bg');

            mapboxgl.accessToken = 'pk.eyJ1IjoiaW1wcmVzc2lvbi1idXJlYXUiLCJhIjoiY2swbWlkNGttMDl5czNkdDdpdnA2YnRucyJ9.ETnTJRRIl8_TU349gbBKgw';

            if (customMap) {
                mapBg.addEventListener('click', function () {
                    mapBg.remove();
                });

                let mapLong = customMap.getAttribute('data-long');
                let mapLat = customMap.getAttribute('data-lat');
                let mapIcon = customMap.getAttribute('data-icon');

                let map = new mapboxgl.Map({
                    container: 'contact-map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: [mapLong, mapLat],
                    zoom: 13
                });

                map.on('load', function () {
                    map.loadImage(`${mapIcon}`, function (error, image) {
                        if (error) throw error;
                        map.addImage('cat', image);
                        map.addLayer({
                            "id": "points",
                            "type": "symbol",
                            "source": {
                                "type": "geojson",
                                "data": {
                                    "type": "FeatureCollection",
                                    "features": [{
                                        "type": "Feature",
                                        "geometry": {
                                            "type": "Point",
                                            "coordinates": [mapLong, mapLat],
                                        }
                                    }]
                                }
                            },
                            "layout": {
                                "icon-image": "cat",
                                "icon-size": .25
                            }
                        });
                    });
                });
            }
        });
    </script>
@endpush
