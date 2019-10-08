import mapboxgl from "mapbox-gl";


if ($('#map').length > 0) {
    // $('.map-mask').on('click', function () {
    //     $(this).addClass('is-disabled');
    // });
    let mapLong = $('#map').data('long');
    let mapLat = $('#map').data('lat');
    let mapIcon = $('#map').data('icon');
    mapboxgl.accessToken = 'pk.eyJ1IjoiaW1wcmVzc2lvbi1idXJlYXUiLCJhIjoiY2swbWlkNGttMDl5czNkdDdpdnA2YnRucyJ9.ETnTJRRIl8_TU349gbBKgw';
    let map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/impression-bureau/ck121zs200ajv1cnoi5lmp0l8',
        center: [mapLong, mapLat],
        zoom: 13
    });

    map.on('load', function () {
        map.loadImage(`${ mapIcon }`, function (error, image) {
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