<?php

namespace Flynt\Components\SideBySide;

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
        'name' => 'SideBySide',
        'label' => 'Side by Side',
        // ANCHOR block 1
        'sub_fields' => [
            [
                'label' => 'Block 1',
                'name' => 'generalTab1',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Block Type',
                'name' => 'blockType1',
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
                        'text' => 'text',
                        'image' => 'image',
                    ],
                'default_value' => 
                    [
                        0 => 'text',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Title Alignment',
                'name' => 'titleAlignment1',
                'type' => 'button_group',
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
                        'H1' => 'H1',
                        'H2' => 'H2',
                        'H3' => 'H3',
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
                'label' => 'Title',
                'name' => 'titleHtml1',
                'type' => 'textarea',
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
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => 'br',
            ],
            [
                'name' => 'descriptionHtml1',
                'label' => 'Content',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 1,
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
                'wrapper' => [
                    'class' => 'autosize ui-taller-100',
                ],
            ],
            [
                'label' => 'Image',
                'name' => 'blockImage1',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
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
                'label' => 'Image Fit',
                'name' => 'imageFit1',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => 'ui-table-cell',
                        'id' => '',
                    ],
                'choices' => 
                    [
                        'cover' => 'cover',
                        'contain' => 'contain',
                    ],
                'default_value' => 
                    [
                        0 => 'cover',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Streched?',
                'name' => 'imageStreched1',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' =>
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                'wrapper' => 
                [
                    'width' => '',
                    'class' => 'ui-table-cell',
                    'id' => '',
                ],
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ],
            [
              'label' => 'Url',
              'name' => 'ctaUrl1',
              'type' => 'text',
              'instructions' => 'Insert website url (ex: /about-us)',
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
                'label' => 'CTA label',
                'name' => 'ctaLabel1',
                'type' => 'text',
                'instructions' => '',
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
            // ANCHOR block2
            [
                'label' => 'Block 2',
                'name' => 'generalTab2',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Block Type',
                'name' => 'blockType2',
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
                        'text' => 'text',
                        'image' => 'image',
                    ],
                'default_value' => 
                    [
                        0 => 'text',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Title Alignment',
                'name' => 'titleAlignment2',
                'type' => 'button_group',
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType2",
                            "operator" => "==",
                            "value" => "text"
                        ]
                    ]
                ],
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
                'name' => 'headingType2',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType2",
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
                'label' => 'Title',
                'name' => 'titleHtml2',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType2",
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
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => 'br',
            ],
            [
                'name' => 'descriptionHtml2',
                'label' => 'Content',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 1,
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType2",
                            "operator" => "==",
                            "value" => "text"
                        ]
                    ]
                ],
                'wrapper' => [
                    'class' => 'autosize ui-taller-100',
                ],
            ],
            [
                'label' => 'Image',
                'name' => 'blockImage2',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType2",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
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
                'label' => 'Image Fit',
                'name' => 'imageFit2',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' =>
                [
                    [
                        [
                            "fieldPath" => "blockType2",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => 'ui-table-cell',
                        'id' => '',
                    ],
                'choices' => 
                    [
                        'cover' => 'cover',
                        'contain' => 'contain',
                    ],
                'default_value' => 
                    [
                        0 => 'cover',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Streched?',
                'name' => 'imageStreched2',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' =>
                [
                    [
                        [
                            "fieldPath" => "blockType2",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                'wrapper' => 
                [
                    'width' => '',
                    'class' => 'ui-table-cell',
                    'id' => '',
                ],
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ],
            [
              'label' => 'Url',
              'name' => 'ctaUrl2',
              'type' => 'text',
              'instructions' => 'Insert website url (ex: /about-us)',
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
                'label' => 'CTA label',
                'name' => 'ctaLabel2',
                'type' => 'text',
                'instructions' => '',
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType2",
                            "operator" => "==",
                            "value" => "text"
                        ]
                    ]
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
                    FieldVariables\getColsClasses1(), 
                    FieldVariables\getColsClasses2(), 
                    FieldVariables\getTheme(),
                    FieldVariables\getBackgroundImage(), 
                    FieldVariables\getBackgroundColor(), 
                ]
            ],
        ]
    ];
}
