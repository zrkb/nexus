//
// map.js
// Theme module
//

const maps = document.querySelectorAll('[data-map]');

// Read the Mapbox token from <meta name="mapbox-token"> (see config/nexus.php)
const tokenMeta = document.querySelector('meta[name="mapbox-token"]');
const accessToken = tokenMeta ? tokenMeta.content : '';

if (typeof mapboxgl !== 'undefined' && accessToken) {
  maps.forEach(map => {
    const elementOptions = map.dataset.map ? JSON.parse(map.dataset.map) : {};

    const defaultOptions = {
      container: map,
      style: 'mapbox://styles/mapbox/light-v9',
      scrollZoom: false,
      interactive: false
    }

    const options = {
      ...elementOptions,
      ...defaultOptions
    };

    // Get access token
    mapboxgl.accessToken = accessToken;

    // Init map
    new mapboxgl.Map(options);
  })
}
