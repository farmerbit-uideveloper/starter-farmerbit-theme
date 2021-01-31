<?php

namespace Flynt\Components\GoogleMaps;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;



const POST_TYPE = 'page';

add_filter('Flynt/addComponentData?name=GoogleMaps', function ($data) {

  $data['api'] = Options::getGlobal('Acf', 'googleMapsApiKey');

  return $data;
});

function getACFLayout()
{

    return [
        'name' => 'googleMaps',
        'label' => 'Google Maps',
        'sub_fields' => [
            [
                'label' => 'General',
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
              'label' => 'Google Maps',
              'name' => 'maps',
              'type' => 'google_map',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'center_lat' => '',
              'center_lng' => '',
              'zoom' => '',
              'height' => '',
            ],  
            [
              'label' => 'Titolo',
              'name' => 'titolo_map',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'default_value' => '',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ],
            [
              'label' => 'Icona',
              'name' => 'pin_map',
              'type' => 'image',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
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
            ],
            [
              'label' => 'Contenuto',
              'name' => 'contenuto_map',
              'type' => 'wysiwyg',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'default_value' => '',
              'tabs' => 'all',
              'toolbar' => 'full',
              'media_upload' => 1,
              'delay' => 1,
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getSectionId(),
                    FieldVariables\getBlockClasses(),
                ]
            ]                      
        ]
    ];

}
