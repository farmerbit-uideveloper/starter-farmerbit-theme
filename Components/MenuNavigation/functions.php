<?php

namespace Flynt\Components\MenuNavigation;

use Timber;
use Flynt\Utils\Asset;
use Flynt\Utils\Options;

add_action('init', function () {
    register_nav_menus([
        'menu' => __('Menu principale', 'uideveloper')
    ]);
});

add_filter('Flynt/addComponentData?name=MenuNavigation', function ($data) {
    $data['menu'] = new Timber\Menu('menu');
    $data['logo'] = [
        'src' => get_theme_mod('custom_header_logo') ? get_theme_mod('custom_header_logo') : Asset::requireUrl('Components/MenuNavigation/Assets/logo.svg'),
        'alt' => get_bloginfo('name')
    ];
    $data['logoSticky'] = [
        'src' => get_theme_mod('sticky_logo') ? get_theme_mod('sticky_logo') : Asset::requireUrl('Components/MenuNavigation/Assets/logo.svg'),
        'alt' => get_bloginfo('name')
    ];
    $data['composerMenu'] = Options::getTranslatable('MenuPrincipale', 'composerMenu');
    $data['imageHamburger'] = Options::getTranslatable('MenuPrincipale', 'imageHamburger');
    $data['bottomInfo'] = Options::getTranslatable('MenuPrincipale', 'bottomInfo');
    $data['arrow'] = Asset::requireUrl('Components/MenuNavigation/Assets/arrow.svg');

    $data['langs'] = function_exists( 'icl_get_languages' ) ? icl_get_languages('skip_missing=0&orderby=code') : false;

    return $data;
});

$widthField = [
    'label' => 'Larghezza Elemento',
    'name' => 'width',
    'type' => 'text',
    'instructions' => 'è possibile utilizzare anche le classi di bootstrap',
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
];

Options::addTranslatable('MenuPrincipale', [
    [
        'name' => 'composer',
        'label' => __('Composer', 'uideveloper'),
        'type' => 'tab'
    ],
    [
        'label' => 'Composer Menu',
        'name' => 'composerMenu',
        'type' => 'flexible_content',
        'instructions' => '',
        'required' => 0,
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'layouts' => [
            'logo' => [
                'name' => 'logo',
                'label' => 'Logo',
                'display' => 'block',
                'sub_fields' => [
                    [
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => 
                        [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                        ],
                        'message' => 'caricare logo tramite ' . '<a href="' . admin_url( '/customize.php?autofocus[section]=title_tagline' ) . '">questa sezione di wordpress</a>',
                        'new_lines' => 'wpautop',
                        'esc_html' => 0,
                    ],
                    $widthField
                ],
                'min' => '',
                'max' => '',
            ],
            'menuDesktop' => [
                'name' => 'menuDesktop',
                'label' => 'Menu Desktop',
                'display' => 'block',
                'sub_fields' => [
                    [
                        'label' => 'Menu Desktop',
                        'name' => 'menuDesktop',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => 
                        [
                          'width' => '',
                          'class' => '',
                          'id' => '',
                        ],
                        'message' => 'impostare header menu tramite ' . '<a href="' . admin_url( '/nav-menus.php' ) . '">questa sezione di wordpress</a> <br>Menu desktop non visibile se attiva opzione "Menu Burger nel desktop"',
                        'new_lines' => 'wpautop',
                        'esc_html' => 0,
                    ],
                    $widthField
                ],
                'min' => '',
                'max' => '',
            ],
            'hamburger' => [
                'name' => 'hamburger',
                'label' => 'Hamburger',
                'display' => 'block',
                'sub_fields' => [
                    [
                        'label' => 'Hamburger',
                        'name' => 'hamburger',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => 
                        [
                          'width' => '',
                          'class' => '',
                          'id' => '',
                        ],
                        'message' => 'Hamburger per menu full screen',
                        'new_lines' => 'wpautop',
                        'esc_html' => 0,
                    ],
                    $widthField
                ],
                'min' => '',
                'max' => '',
            ],
            'switchWPML' => [
                'name' => 'switchWPML',
                'label' => 'Switch Lang WPML',
                'display' => 'block',
                'sub_fields' => [
                    [
                        'label' => 'Switch Lang WPML',
                        'name' => 'wpmlSwitch',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => 
                        [
                          'width' => '',
                          'class' => '',
                          'id' => '',
                        ],
                        'message' => 'Se c\'è WPML installato verrà inserito lo switch delle lingue',
                        'new_lines' => 'wpautop',
                        'esc_html' => 0,
                    ],
                    $widthField
                ],
                'min' => '',
                'max' => '',
            ],
            'search' => [
                'name' => 'search',
                'label' => 'Search',
                'display' => 'block',
                'sub_fields' => [
                    [
                        'label' => 'Search',
                        'name' => 'search',
                        'type' => 'message',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => 
                        [
                          'width' => '',
                          'class' => '',
                          'id' => '',
                        ],
                        'message' => 'Ricerca nel sito full-screen',
                        'new_lines' => 'wpautop',
                        'esc_html' => 0,
                    ],
                    $widthField
                ],
                'min' => '',
                'max' => '',
            ],
            'text' => [
                'name' => 'text',
                'label' => 'Testo',
                'display' => 'block',
                'sub_fields' => [
                    [
                        'label' => 'Testo',
                        'name' => 'text',
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
                    $widthField
                ],
                'min' => '',
                'max' => '',
            ],
        ],
        'button_label' => 'Aggiungi Elemento',
        'min' => '',
        'max' => '',
    ],
    // [
    //     'label' => 'Info contatto',
    //     'name' => 'bottomInfo',
    //     'type' => 'wysiwyg',
    //     'instructions' => '',
    //     'required' => 0,
    //     'wrapper' => 
    //     [
    //       'width' => '',
    //       'class' => '',
    //       'id' => '',
    //     ],
    //     'default_value' => '',
    //     'tabs' => 'all',
    //     'toolbar' => 'full',
    //     'media_upload' => 1,
    //     'delay' => 0,
    // ],
    [
        'name' => 'options',
        'label' => __('Opzioni', 'uideveloper'),
        'type' => 'tab'
    ],
    [
        'label' => 'Menu Burger nel desktop',
        'name' => 'burgerOnDesktop',
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
]);

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5fbe32bca5a2c',
        'title' => 'Immagine SubMenu',
        'fields' => array(
            array(
                'key' => 'field_5fbe334387ffb',
                'label' => 'Immagine',
                'name' => 'image',
                'type' => 'image',
                'instructions' => 'Se questa voce di menu ha delle voci come sottomenu, è possibile inserire un\'immagine.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'nav_menu_item',
                    'operator' => '==',
                    'value' => 'all',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
    
endif;