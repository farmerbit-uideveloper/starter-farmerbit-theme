<?php

namespace Flynt\Components\HeroSlider;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'HeroSlider',
        'label' => 'Hero Slider',
        'sub_fields' => [
            [
                'label' => 'General',
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Slider',
                'name' => 'slider',
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
                'button_label' => '<span style="vertical-align: -25%" class="dashicons dashicons-plus-alt"></span> SLIDE',
                'sub_fields' => 
                [
                  0 => 
                  [
                    'label' => 'Titolo',
                    'name' => 'title',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => 
                    [
                      'width' => '',
                      'class' => 'fc-divider',
                      'id' => '',
                    ],
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => 3,
                    'new_lines' => 'br',
                  ],
                  1 =>
                  [
                    'label' => 'Heading tag',
                    'name' => 'headingType',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 
                    [
                        [
                            [
                                "fieldPath" => "blockType1",
                                "operator" => "==",
                                "value" => "text"
                            ]
                        ]
                    ],
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
							'span.h1' => 'span.h1',
							'span.h2' => 'span.h2',
							'span.h3' => 'span.h3',
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
                  2 => 
                  [
                    'label' => 'Immagine',
                    'name' => 'image',
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
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 0,
                    'wrapper' => 
                    [
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ],
                    'return_format' => 'array',
                  ],
                  4 => 
                  [
                    'label' => 'Aggiungere Video',
                    'name' => 'isVideo',
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
                  ],
                  5 =>
                  [
                    'label' => 'Link Video Youtube',
                    'name' => 'linkVideo',
                    'type' => 'text',
                    'instructions' => 'Aggiungere link video youtube',
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
                ],
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
					FieldVariables\getSectionId(),
					FieldVariables\getTheme(),
					FieldVariables\getBlockClasses(),
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
            ],
        ],
    ];
}
