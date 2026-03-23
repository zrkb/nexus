//
// map.js
// Theme module
//

const maps = document.querySelectorAll('[data-map]');
const accessToken = '';

if (typeof mapboxgl !== 'undefined') {
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
