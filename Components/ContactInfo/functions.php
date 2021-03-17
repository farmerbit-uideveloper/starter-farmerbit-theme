<?php

namespace Flynt\Components\ContactInfo;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=ContactInfo', function ($data) {

    return $data;
});

function getACFLayout()
{

    return [
        'name' => 'contactInfo',
        'label' => 'Info Contatti',
        'sub_fields' => [
            [
                'label' => 'Block 1',
                'name' => 'block1',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Titolo',
                'name' => 'titleBlock1',
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
                'label' => 'Contenuto',
                'name' => 'contentBlock1',
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
                'delay' => 0,
            ],        
            [
                'label' => 'Block 2',
                'name' => 'block2',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Titolo',
                'name' => 'titleBlock2',
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
                'label' => 'Contenuto',
                'name' => 'contentBlock2',
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
                'delay' => 0,
            ], 
            [
                'label' => 'Block 3',
                'name' => 'block3',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Titolo',
                'name' => 'titleBlock3',
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
                'label' => 'Contenuto',
                'name' => 'contentBlock3',
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
                'delay' => 0,
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
                ]
            ],                       
        ]
    ];

}

Options::addGlobal('Breadcrumbs', [
    [
        'name' => 'options',
        'label' => __('Opzioni', 'mis'),
        'type' => 'tab'
    ],
    [
        'label' => 'Separatore',
        'name' => 'separator',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '|',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ]
]);