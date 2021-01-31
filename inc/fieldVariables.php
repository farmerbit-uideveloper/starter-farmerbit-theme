<?php

/**
 * Defines field variables to be used across multiple components.
 */

namespace Flynt\FieldVariables;

function getTheme()
{
    return [
        'label' => 'Theme',
        'name' => 'theme',
        'type' => 'select',
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'ajax' => 0,
        'choices' => [
            '' => '(none)',
            'themeLight' => 'Light',
            'themeDark' => 'Dark',
            'themeHero' => 'Hero'
        ]
    ];
}

function getCardsTheme()
{
    return [
        'label' => 'Cards Theme',
        'name' => 'cardsTheme',
        'type' => 'select',
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'ajax' => 0,
        'choices' => [
            '' => '(none)',
            'cards-white' => 'white',
            'cards-lightgrey' => 'lightgrey',
        ]
    ];
}

function getIcon()
{
    return [
        'label' => 'Icon',
        'name' => 'icon',
        'type' => 'text',
        'instructions' => 'Enter a valid icon name from <a href="https://feathericons.com">Feather Icons</a> (e.g. `check-circle`).',
        'required' => 1
    ];
}

function getBackgroundColor() {
    return [
      'label' => 'Colore sfondo',
      'name' => 'bgColor',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'wrapper' => 
      [
        'width' => '',
        'class' => '',
        'id' => '',
      ],
      'default_value' => '',
    ];
}

function getBackgroundImage() {
    return [
      'label' => 'Background Image',
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
    ];
}

function getSectionId() {
  return[
    [
      'label' => 'Section ID',
      'name' => 'sectionId',
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
    ]
  ];
}


function getBlockClasses() {
  return [
    [
      'label' => 'Classes',
      'name' => 'blockClasses',
      'type' => 'text',
      'instructions' => 'section -> margine basso tra una sezione ed un\'altra',
      'required' => 0,
      'wrapper' => 
      [
        'width' => '',
        'class' => '',
        'id' => '',
      ],
      'default_value' => 'section',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ]
  ];
}

function getColsClasses() {
  return [
    [
      'label' => 'Cols classes',
      'name' => 'colsClasses',
      'type' => 'text',
      'instructions' => '<small>default: col-md-12</small>',
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
    ]
  ];
}

function getColsClasses1() {
  return [
    [
      'label' => 'Block 1: Cols classes',
      'name' => 'colsClasses1',
      'type' => 'text',
      'instructions' => '<small>default: col-md-6</small>',
      'required' => 0,
      'wrapper' => 
      [
        'width' => '',
        'class' => '',
        'id' => '',
      ],
      'default_value' => 'col-md-11 col-lg-9',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ]
  ];
}

function getColsClasses2() {
  return [
    [
      'label' => 'Block 2: Cols classes',
      'name' => 'colsClasses2',
      'type' => 'text',
      'instructions' => '<small>default: col-md-6</small>',
      'required' => 0,
      'wrapper' => 
      [
        'width' => '',
        'class' => '',
        'id' => '',
      ],
      'default_value' => 'col-md-6',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ]
  ];
}