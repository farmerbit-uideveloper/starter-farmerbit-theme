<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => 'Contenuto pagina',
		'style' => 'seamless',
		'default closed' =>	__("Standard Collapsed",'acf'), // FC default collapsed
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Contenuto pagina', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Aggiungi blocco', 'flynt'),
                'layouts' => [
					Components\HeroSlider\getACFLayout(),
					Components\Breadcrumbs\getACFLayout(),
                    Components\Form\getACFLayout(),
                    Components\GoogleMaps\getACFLayout(),
                    Components\LeaveMeAlone\getACFLayout(),
                    Components\SideBySide\getACFLayout(),
                    Components\Banner\getACFLayout(),
                    Components\Hero\getACFLayout(),
                    Components\ContactInfo\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ]
            ]
        ]
    ]);

    ACFComposer::registerFieldGroup([
        'name' => 'fixerCta',
        'title' => 'Banner basso a comparsa',
        'style' => 'default',
        'position' => 'side',
        'fields' => [
            [
                'label' => 'Attivare banner basso a comparsa',
                'name' => 'fixerCta',
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
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ]
            ]
        ]
    ]);

    ACFComposer::registerFieldGroup([
        'name' => 'iconFloat',
        'title' => 'Icona di sfondo',
        'style' => 'default',
        'position' => 'side',
        'fields' => [
            [
                'label' => 'Aggiungere icona di sfondo durante lo scroll',
                'name' => 'iconFloatPage',
                'type' => 'image',
                'instructions' => 'Utile sopratutto per le sottopagine dei Settori. Lasciare vuoto per disattivare l\'icona',
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
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ]
            ]
        ]
    ]);

    ACFComposer::registerFieldGroup([
        'name' => 'tranglePage',
        'title' => 'Effetto triangolo di sfondo',
        'style' => 'default',
        'position' => 'side',
        'fields' => [
            [
                'label' => 'Attivare triangolo di sfondo',
                'name' => 'tranglePage',
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
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ]
            ]
        ]
    ]);

});
