import $ from 'jquery';
import {
    Loader
} from '@googlemaps/js-api-loader';

const $map = $( '#map' );

if( $map.length && typeof google === 'object' && typeof google.maps === 'object' ) {

	const loader = new Loader({
		apiKey: $map.data('api'),
		version: "weekly",
		libraries: ["places"]
	});
	
	let lat = $map.data('lat');
	let lng = $map.data('lng');
	let zoom = $map.data('zoom');
	let titolo = $('.data-map .title').html();
	let contenuto = $('.data-map .content').html();
	let pin = $('.data-map img').attr('src');
	let coordinate = {
		lat: lat,
		lng: lng
	};
	
	let contentString = '<div style="padding: 30px 30px; text-align: center;">' + contenuto + '</div>';
	
	const mapOptions = {
		center: {
			lat: lat,
			lng: lng
		},
		zoom: zoom
	};
	
	loader
		.load()
		.then(() => {
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
	
			var image = {
				url: pin,
				scaledSize: new google.maps.Size(40, 60),
				//origin: new google.maps.Point(0, 0),
				//anchor: new google.maps.Point(0, 32)
			};
	
	
			var marker = new google.maps.Marker({
				position: coordinate,
				map: map,
				title: titolo,
				icon: image,
			});
	
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
	
			const styles = [{
					"featureType": "water",
					"elementType": "geometry.fill",
					"stylers": [{
						"color": "#d3d3d3"
					}]
				},
				{
					"featureType": "transit",
					"stylers": [{
							"color": "#808080"
						},
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.stroke",
					"stylers": [{
							"visibility": "on"
						},
						{
							"color": "#b3b3b3"
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.fill",
					"stylers": [{
						"color": "#ffffff"
					}]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry.fill",
					"stylers": [{
							"visibility": "on"
						},
						{
							"color": "#ffffff"
						},
						{
							"weight": 1.8
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry.stroke",
					"stylers": [{
						"color": "#d7d7d7"
					}]
				},
				{
					"featureType": "poi",
					"elementType": "geometry.fill",
					"stylers": [{
							"visibility": "on"
						},
						{
							"color": "#ebebeb"
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry",
					"stylers": [{
						"color": "#a7a7a7"
					}]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry.fill",
					"stylers": [{
						"color": "#ffffff"
					}]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry.fill",
					"stylers": [{
						"color": "#ffffff"
					}]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry.fill",
					"stylers": [{
							"visibility": "on"
						},
						{
							"color": "#efefef"
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "labels.text.fill",
					"stylers": [{
						"color": "#696969"
					}]
				},
				{
					"featureType": "administrative",
					"elementType": "labels.text.fill",
					"stylers": [{
							"visibility": "on"
						},
						{
							"color": "#737373"
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "labels.icon",
					"stylers": [{
						"visibility": "off"
					}]
				},
				{
					"featureType": "poi",
					"elementType": "labels",
					"stylers": [{
						"visibility": "off"
					}]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry.stroke",
					"stylers": [{
						"color": "#d6d6d6"
					}]
				},
				{
					"featureType": "road",
					"elementType": "labels.icon",
					"stylers": [{
						"visibility": "off"
					}]
				},
				{},
				{
					"featureType": "poi",
					"elementType": "geometry.fill",
					"stylers": [{
						"color": "#dadada"
					}]
				}
			];
	
			map.setOptions({
				styles: styles
			});
	
		})
		.catch(e => {
			// do something
		});

}