<?php

namespace Flynt\Components\Banner;

use Flynt\FieldVariables;
use Flynt\Utils\Options;


// add_filter('Flynt/addComponentData?name=SideBySide', function ($data) {

//     $data['cta1'] = $data['cta1'] ? manageUrl( $data['cta1'] ) : '';
//     $data['cta2'] = $data['cta1'] ? manageUrl( $data['cta2'] ) : '';

//     return $data;

// });


function getACFLayout()
{
    return [
        'name' => 'Banner',
        'label' => 'Banner',
        // ANCHOR block 1
        'sub_fields' => [
            [
                'label' => 'Block',
                'name' => 'generalTab1',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Title Alignment',
                'name' => 'titleAlignment1',
                'type' => 'button_group',
                'choices' => [
                    'text-left' => '
<i class=\'dashicons dashicons-editor-alignleft\' title=\'Align text left\'></i>',
                    'text-center' => '
<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Align text center\'></i>',
                    'text-right' => '
<i class=\'dashicons dashicons-editor-alignright\' title=\'Align text right\'></i>',
                    'text-justify' => '
<i class=\'dashicons dashicons-editor-justify\' title=\'Justify text\'></i>'
				],
				'default_value' => ''
            ],
            [
                'label' => 'Heading tag',
                'name' => 'headingType1',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                'choices' => 
                    [
                        'h1' => 'h1',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'div' => 'div',
                        'span' => 'span',
                    ],
                'default_value' => 
                    [
                        0 => 'h1',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'textarea',
                'name' => 'title',
                'type' => 'textarea',
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
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => 'br',
            ],
            [
                'label' => 'Tipo di banner',
                'name' => 'bannerType',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                [
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ],
                'choices' => 
                [
                  'bg-img' => 'Immagine di sfondo',
                  'bg-video' => 'Video di sfondo',
                ],
                'default_value' => 
                [
                  0 => 'bg-img',
                ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'ID Video Dailymotion',
                'name' => 'idVideo',
                'type' => 'text',
                'instructions' => '',
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'bannerType',
                            'operator' => '==',
                            'value' => 'bg-video',
                        ],
                    ],
                ],
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
                'label' => 'Immagine di sfondo',
                'name' => 'bgImage',
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
                'label' => 'Testo sopra l\'immagine',
                'name' => 'textImage',
                'type' => 'wysiwyg',
                'instructions' => '',
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'bannerType',
                            'operator' => '==',
                            'value' => 'bg-img',
                        ],
                    ],
                ],
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
            ],
        ]
    ];
}
