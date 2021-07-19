<?php

namespace Flynt\Components\Carousel;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=Carousel', function ($data) {

    $cols_options = isset( $data['options'] ) && isset( $data['options']['cols'] ) ? $data['options']['cols'] : '1-2-3-4';
    $data['cols'] = $cols_options;

    return $data;
});


/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout()
{
    return [
        'label' => 'Carousel',
        'name' => 'carousel',
        'sub_fields' => getSubFields()
    ];
}

/**
 * Sub Component inside a Standard Component
 *
 * @param boolean $suffix
 * @return void
 */
function getSubComponent( $suffix = false )
{  
    $suffix = $suffix ? '_' . $suffix : '';

    return [
        'label' => 'Carousel (sub)',
        'name' => 'subCompCarousel' . $suffix,
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'layout' => 'block',
        'sub_fields' => getSubFields()
    ];  

}

/**
 * Sharing subfields between Sub Component and ACF Layout
 *
 * @param boolean $options : false hide options tab & fields
 * @return void
 */
function getSubFields( $options = true ) {

    return [
        [
            'label' => 'General',
            'name' => 'generalTab',
            'type' => 'tab',
            'placement' => 'top',
            'endpoint' => 0
        ],
        [
            'label' => 'Elenco immagini',
            'name' => 'images',
            'type' => 'gallery',
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
            'insert' => 'append',
            'library' => 'all',
            'min' => '',
            'max' => '',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ],
        $options ? [
            'label' => 'Options',
            'name' => 'optionsTab',
            'type' => 'tab',
            'placement' => 'top',
            'endpoint' => 0
        ] : [],
        $options ? [
            'label' => '',
            'name' => 'options',
            'type' => 'group',
            'layout' => 'row',
            'sub_fields' => [
                FieldVariables\getSectionId(),
                FieldVariables\getSectionClasses(),
				FieldVariables\getContainer(),
				FieldVariables\getRow(),
                FieldVariables\getItemClasses(),
                [
                    'label' => 'Responsive columns',
                    'name' => 'cols',
                    'type' => 'text',
                    'instructions' => 'cols by breakpoints <br>ex: "1-2-3-4" <br>(xs-sm-md-lg)',
                    'required' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '1-2-3-4',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ],
                [
                    'label' => 'Enable Autoplay',
                    'name' => 'autoplay',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1
                ],
                [
                    'label' => 'Autoplay Speed (in milliseconds)',
                    'name' => 'autoplaySpeed',
                    'type' => 'number',
                    'min' => 2000,
                    'step' => 1,
                    'default_value' => 4000,
                    'required' => 1,
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'autoplay',
                                'operator' => '==',
                                'value' => 1
                            ]
                        ]
                    ],
                ],
            ]
        ] : [],
    ];

}