<?php

namespace Flynt\Components\Hero;

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
        'name' => 'Hero',
        'label' => 'Hero pagina',
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
                'label' => 'Titolo',
                'name' => 'titleHtml1',
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
                'label' => 'Descrizione',
                'name' => 'description',
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
                'label' => 'Immagine',
                'name' => 'imgHero',
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
