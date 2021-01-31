<?php

namespace Flynt\Components\ColumnsFooter;

use Flynt\Utils\Options;
use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=ColumnsFooter', function ($data) {

    $data['htmlTitle_col1'] = Options::getTranslatable('ColumnsFooter', 'htmlTitle_col1');
    $data['htmlDescription_col1'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_col1');
    $data['htmlTitle_col2'] = Options::getTranslatable('ColumnsFooter', 'htmlTitle_col2');
    $data['htmlDescription_col2'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_col2');
    $data['htmlTitle_col3'] = Options::getTranslatable('ColumnsFooter', 'htmlTitle_col3');
    $data['htmlDescription_col3'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_col3');   
    $data['htmlTitle_col4'] = Options::getTranslatable('ColumnsFooter', 'htmlTitle_col4');
    $data['htmlDescription_col4'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_col4');


    $data['htmlDescription_subcol1'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_subcol1');
    $data['htmlDescription_subcol2'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_subcol2');
    $data['htmlDescription_subcol3'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_subcol3');   
    $data['htmlDescription_subcol4'] = Options::getTranslatable('ColumnsFooter', 'htmlDescription_subcol4');
    
    
    
    $data['logo'] = [
      'src' => get_theme_mod('custom_header_logo') ? get_theme_mod('custom_header_logo') : '',
      'alt' => get_bloginfo('name')
    ];
	
    $data['options'] = Options::getTranslatable('ColumnsFooter', 'options');    

    return $data;
});

Options::addTranslatable('ColumnsFooter', [
    [
      [
          'label' => 'Footer column 1',
          'name' => 'columnsFooter_col1',
          'type' => 'tab',
          'endpoint' => 0,
      ],
      // [
      //   'label' => 'testo',
      //   'name' => 'htmlTitle_col1',
      //   'type' => 'text',
      //   'instructions' => '',
      //   'required' => 0,
      //   'wrapper' => 
      //   [
      //     'width' => '',
      //     'class' => '',
      //     'id' => '',
      //   ],
      //   'default_value' => '',
      //   'placeholder' => '',
      //   'prepend' => '',
      //   'append' => '',
      //   'maxlength' => '',
      // ],
      [
        'label' => 'editor',
        'name' => 'htmlDescription_col1',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => '',
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0,
      ],
      [
          'label' => 'Footer column 2',
          'name' => 'columnsFooter_col2',            
          'type' => 'tab',
          'endpoint' => 0,
      ],
      [
        'label' => 'testo',
        'name' => 'htmlTitle_col2',
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
        'label' => 'editor',
        'name' => 'htmlDescription_col2',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => '',
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0,
      ],
      [
          'label' => 'Footer column 3',
          'name' => 'columnsFooter_col3',            
          'type' => 'tab',
          'endpoint' => 0,
      ],
      [
        'label' => 'testo',
        'name' => 'htmlTitle_col3',
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
        'label' => 'editor',
        'name' => 'htmlDescription_col3',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => '',
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0,
      ],
      [
        'label' => 'Footer column 4',
        'name' => 'columnsFooter_col4',
        'type' => 'tab',
        'endpoint' => 0
      ],
      [
        'label' => 'testo',
        'name' => 'htmlTitle_col4',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => [
          'width' => '',
          'class' => '',
          'id' => ''
        ],
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => ''
      ],
      [
        'label' => 'editor',
        'name' => 'htmlDescription_col4',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => ''
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0
      ],		
      // subfooter
      [
        'label' => 'Footer sub-column 1',
        'name' => 'columnsFooter_subcol1',
        'type' => 'tab',
        'endpoint' => 0,
      ],
      [
        'label' => 'editor',
        'name' => 'htmlDescription_subcol1',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => '',
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0,
      ],
      [
          'label' => 'Footer sub-column 2',
          'name' => 'columnsFooter_subcol2',            
          'type' => 'tab',
          'endpoint' => 0,
      ],
      [
        'label' => 'editor',
        'name' => 'htmlDescription_subcol2',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => '',
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0,
      ],
      [
          'label' => 'Footer sub-column 3',
          'name' => 'columnsFooter_subcol3',            
          'type' => 'tab',
          'endpoint' => 0,
      ],
      [
        'label' => 'editor',
        'name' => 'htmlDescription_subcol3',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => '',
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0,
      ],
      [
        'label' => 'Footer sub-column 4',
        'name' => 'columnsFooter_subcol4',
        'type' => 'tab',
        'endpoint' => 0
      ],
      [
        'label' => 'editor',
        'name' => 'htmlDescription_subcol4',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => [
          'width' => '',
          'class' => 'ui-taller-200',
          'id' => ''
        ],
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 0,
        'delay' => 0
      ],
      // options
      [
          'label' => 'OPTIONS',
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
          [
            'label' => 'column 1 classes',
            'name' => 'classes_col1',
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
            'label' => 'column 2 classes',
            'name' => 'classes_col2',
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
            'label' => 'column 3 classes',
            'name' => 'classes_col3',
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
            'label' => 'column 4 classes',
            'name' => 'classes_col4',
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
            'label' => 'Sub-column 1 classes',
            'name' => 'classes_subcol1',
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
            'label' => 'Sub-column 2 classes',
            'name' => 'classes_subcol2',
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
            'label' => 'Sub-column 3 classes',
            'name' => 'classes_subcol3',
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
            'label' => 'Sub-column 4 classes',
            'name' => 'classes_subcol4',
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
          FieldVariables\getTheme()         
        ]
      ],  
    ],
]);
