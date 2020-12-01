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
                    "icon-size": 1
                }
            });
        });
    });
}
