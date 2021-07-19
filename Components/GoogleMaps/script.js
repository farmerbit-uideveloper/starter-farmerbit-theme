import $ from 'jquery';
//import { Loader } from '@googlemaps/js-api-loader';
import { init } from '../../assets/scripts/ExternalScriptLoader/Providers/googleMaps';
import {debounce, onResize} from '../../assets/main.js';

var $map = $( '#map' );

const mapHeight = () => {
	if( $( 'body.bp-lg' ).length || $( 'body.bp-xl' ).length ) {
		$( '#map' ).height( $( window ).height() - $( '.menu-navigation' ).outerHeight() );
	}
}

const OnResizeCallback = debounce((ev) => {
	mapHeight();
}, 250);
window.addEventListener('resize', OnResizeCallback);

onResize( mapHeight );


$(document).ready(function() {

	if( $( '#map' ).length ) {

		let options = { 
			apiKey: $map.data('api')
		}

		init(options).then((result, displayError) => {

			var bounds = new google.maps.LatLngBounds();

			var zoom = $map.data('zoom');
		
			const mapOptions = {
				center: {
					lat: 37.4419,
					lng: -122.1419
				},
				zoom: zoom
			};

			var map = new google.maps.Map(document.getElementById('map'), mapOptions);			

			$('#mapPins .pin').each(function() {

				let lat = $(this).data('lat');
				let lng = $(this).data('lng');
				let titolo = $(this).find('title').html();
				let contenuto = $(this).find('.content').html();
				let pin = $(this).data('pin');
				let coordinate = {
					lat: lat,
					lng: lng
				};

				bounds.extend(new google.maps.LatLng(lat, lng));

				let contentString = '<div style="padding: 30px 30px; text-align: center;">' + contenuto + '</div>';

				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});

				let image = {
					url: pin,
					scaledSize: new google.maps.Size(40, 60),
					//origin: new google.maps.Point(0, 0),
					//anchor: new google.maps.Point(0, 32)
				};				

				let marker = new google.maps.Marker({
					position: coordinate,
					map: map,
					title: titolo,
					icon: image,
				});

				marker.addListener('click', function() {
					infowindow.open(map, marker);
				});

				map.fitBounds(bounds);
			});

			const styles = [
				{
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#f5f5f5"
					}
				  ]
				},
				{
				  "elementType": "labels.icon",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#616161"
					}
				  ]
				},
				{
				  "elementType": "labels.text.stroke",
				  "stylers": [
					{
					  "color": "#f5f5f5"
					}
				  ]
				},
				{
				  "featureType": "administrative.land_parcel",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "administrative.land_parcel",
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#bdbdbd"
					}
				  ]
				},
				{
				  "featureType": "administrative.neighborhood",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "poi",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#eeeeee"
					}
				  ]
				},
				{
				  "featureType": "poi",
				  "elementType": "labels.text",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "poi",
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#757575"
					}
				  ]
				},
				{
				  "featureType": "poi.business",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "poi.park",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#e5e5e5"
					}
				  ]
				},
				{
				  "featureType": "poi.park",
				  "elementType": "labels.text",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "poi.park",
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#9e9e9e"
					}
				  ]
				},
				{
				  "featureType": "road",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#ffffff"
					}
				  ]
				},
				{
				  "featureType": "road",
				  "elementType": "labels",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "road.arterial",
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#757575"
					}
				  ]
				},
				{
				  "featureType": "road.highway",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#dadada"
					}
				  ]
				},
				{
				  "featureType": "road.highway",
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#616161"
					}
				  ]
				},
				{
				  "featureType": "road.local",
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#9e9e9e"
					}
				  ]
				},
				{
				  "featureType": "transit.line",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#e5e5e5"
					}
				  ]
				},
				{
				  "featureType": "transit.station",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#eeeeee"
					}
				  ]
				},
				{
				  "featureType": "water",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#c9c9c9"
					}
				  ]
				},
				{
				  "featureType": "water",
				  "elementType": "labels.text",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "water",
				  "elementType": "labels.text.fill",
				  "stylers": [
					{
					  "color": "#9e9e9e"
					}
				  ]
				}
			  ];

			map.setOptions({
				styles: styles
			});

			var listener = google.maps.event.addListener(map, "idle", function () {
				map.setZoom(zoom);
				google.maps.event.removeListener(listener);
			});
		});			

	}
});

