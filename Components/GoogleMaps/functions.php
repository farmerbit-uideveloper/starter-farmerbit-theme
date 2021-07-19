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
              'label' => 'Zoom',
              'name' => 'zoom',
              'type' => 'range',
              'instructions' => '',
              'required' => 0,
              'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'default_value' => 14,
              'min' => 0,
              'max' => 20,
              'step' => 1,
              'prepend' => '',
              'append' => '',
            ],
            [
              'label' => 'Pins',
              'name' => 'pins',
              'type' => 'repeater',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'collapsed' => '',
              'min' => 0,
              'max' => 0,
              'layout' => 'row',
              'button_label' => '+ AGGIUNGI PIN',
              'sub_fields' => 
              [
                0 => 
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
                1 =>
                [
                  'label' => 'Titolo',
                  'name' => 'title',
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
                2 =>
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
                3 =>
                [
                  'label' => 'Contenuto',
                  'name' => 'content',
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
              ],
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
                  FieldVariables\getSectionClasses(),
                  FieldVariables\getContainer(),
                  FieldVariables\getRow(),
                  FieldVariables\getColsClasses(),
                  FieldVariables\getItemClasses(),
                ]
            ]                      
        ]
    ];

}
