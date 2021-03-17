<?php

namespace Flynt\Acf;

use Flynt\Utils\Options;

add_filter('pre_http_request', function ($preempt, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        $response = wp_cache_get($url, 'oembedCache');
        if (!empty($response)) {
            return $response;
        }
    }
    return false;
}, 10, 3);

add_filter('http_response', function ($response, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        wp_cache_set($url, $response, 'oembedCache');
    }
    return $response;
}, 10, 3);

add_filter('acf/fields/google_map/api', function ($api) {
    $apiKey = Options::getGlobal('Acf', 'googleMapsApiKey');
    if ($apiKey) {
        $api['key'] = $apiKey;
    }
    return $api;
});

Options::addGlobal('Acf', [
    [
        'name' => 'googleMapsTab',
        'label' => __('Google Maps', 'uideveloper'),
        'type' => 'tab'
    ],
    [
        'name' => 'googleMapsApiKey',
        'label' => __('Google Maps Api Key', 'uideveloper'),
        'type' => 'text',
        'maxlength' => 100,
        'prepend' => '',
        'append' => '',
        'placeholder' => ''
    ]
]);

$name = [
    'label' => 'Name',
    'name' => 'name',
    'type' => 'text',
    'instructions' => 'Non utilizzare spazio o lettere maiuscole.',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
];

$placeholder = [
    'label' => 'Placeholder',
    'name' => 'placeholder',
    'type' => 'text',
    'instructions' => '',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
];

$width = [
    'label' => 'Width',
    'name' => 'width',
    'type' => 'text',
    'instructions' => 'Utilizzare le classi di bootstrap',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => 'col-lg-12',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
];

$text = [
    'label' => 'Testo',
    'name' => 'text',
    'type' => 'text',
    'instructions' => '',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
];

$required = [
    'label' => 'Campo Obbligatorio',
    'name' => 'required',
    'type' => 'true_false',
    'instructions' => '',
    'required' => 0,
    'wrapper' => 
    [
    'width' => '',
    'class' => '',
    'id' => '',
    ],
    'message' => '',
    'default_value' => 0,
    'ui' => 1,
    'ui_on_text' => '',
    'ui_off_text' => '',
];



if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5fa3c582eec68',
		'title' => 'Immagine evidenza',
		'fields' => array(
			array(
				'key' => 'field_604def73284c3',
				'label' => '',
				'name' => 'term_image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'uideveloper_project_cat',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
endif;