<?php

namespace Flynt\Acf;

use Flynt\Utils\Options;

add_filter('pre_http_request', function ($preempt, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        $response = wp_cache_get($url, 'oembedCache');
        if (!empty($response)) {
            return $response;
        }
    }
    return false;
}, 10, 3);

add_filter('http_response', function ($response, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        wp_cache_set($url, $response, 'oembedCache');
    }
    return $response;
}, 10, 3);

add_filter('acf/fields/google_map/api', function ($api) {
    $apiKey = Options::getGlobal('Acf', 'googleMapsApiKey');
    if ($apiKey) {
        $api['key'] = $apiKey;
    }
    return $api;
});

Options::addGlobal('Acf', [
    [
        'name' => 'googleMapsTab',
        'label' => __('Google Maps', 'flynt'),
        'type' => 'tab'
    ],
    [
        'name' => 'googleMapsApiKey',
        'label' => __('Google Maps Api Key', 'flynt'),
        'type' => 'text',
        'maxlength' => 100,
        'prepend' => '',
        'append' => '',
        'placeholder' => ''
    ]
]);

$name = [
    'label' => 'Name',
    'name' => 'name',
    'type' => 'text',
    'instructions' => 'Non utilizzare spazio o lettere maiuscole.',
    'required' => 0,
    'wrapper' => [
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

$placeholder = [
    'label' => 'Placeholder',
    'name' => 'placeholder',
    'type' => 'text',
    'instructions' => '',
    'required' => 0,
    'wrapper' => [
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

$width = [
    'label' => 'Width',
    'name' => 'width',
    'type' => 'text',
    'instructions' => 'Utilizzare le classi di bootstrap',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => 'col-lg-12',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
];

$text = [
    'label' => 'Testo',
    'name' => 'text',
    'type' => 'text',
    'instructions' => '',
    'required' => 0,
    'wrapper' => [
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

$required = [
    'label' => 'Campo Obbligatorio',
    'name' => 'required',
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
];

Options::addTranslatable('BannerAComparsa', [
    [
        'label' => __('General', 'flynt'),
        'name' => 'general',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
    ],
    [
        'label' => 'Titolo banner',
        'name' => 'fixedCtaTitle',
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
        'label' => 'Testo pulsante',
        'name' => 'textButton',
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
        'label' => 'Form',
        'name' => 'generalTab4',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0,
        'conditional_logic' => [
            [
                [
                    'fieldPath' => 'cta_type',
                    'operator' => '==',
                    'value' => 'popup',
                ],
            ],
        ],
    ],
    [
        'label' => 'Titolo',
        'name' => 'titleForm',
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
        'name' => 'descriptionForm',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 1,
    ],
    [
        'label' => 'Email destinatario',
        'name' => 'to',
        'type' => 'text',
        'instructions' => 'Lasciare vuota per inviare la mail alla mail impostata sulle impostazioni',
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
        'label' => 'Oggetto email',
        'name' => 'object',
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
        'label' => 'Header From',
        'name' => 'headerFrom',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
        'width' => '',
        'class' => '',
        'id' => '',
        ],
        'default_value' => 'From: nome sito <noreply@dominio.sito>',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
    ],
    [
        'label' => 'Header ReplyTo',
        'name' => 'headerReplyTo',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
        'width' => '',
        'class' => '',
        'id' => '',
        ],
        'default_value' => 'Reply-To: [nome] <[email]>',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
    ],
    [
        'label' => 'Campi del form',
        'name' => 'campiForm',
        'type' => 'flexible_content',
        'instructions' => '',
        'required' => 0,
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'layouts' => [
        'text' => [
            'name' => 'text',
            'label' => 'Text',
            'display' => 'block',
            'sub_fields' => [
                $name,
                $placeholder,
                $width,
                $required
                ],
            'min' => '',
            'max' => '',
        ],
        'email' => [
            'name' => 'email',
            'label' => 'Email',
            'display' => 'block',
            'sub_fields' => [
                $name,
                $placeholder,
                $width,
                $required
            ],
            'min' => '',
            'max' => '',
        ],
        'textarea' => [
            'name' => 'textarea',
            'label' => 'Area di testo',
            'display' => 'block',
            'sub_fields' => [
                $name,
                $placeholder,
                $width,
                $required
            ],
            'min' => '',
            'max' => '',
        ],
        'checkbox' => [
            'name' => 'checkbox',
            'label' => 'Checkbox',
            'display' => 'block',
            'sub_fields' => [
                $name,
                $text,
                $width,
                $required
            ],
            'min' => '',
            'max' => '',
        ],
        'data' => [
            'name' => 'data',
            'label' => 'Data',
            'display' => 'block',
            'sub_fields' => [
                $name,
                $placeholder,
                $width,
                $required
            ],
            'min' => '',
            'max' => '',
        ],
        'ora' => [
            'name' => 'ora',
            'label' => 'Ora',
            'display' => 'block',
            'sub_fields' => [
                $name,
                $placeholder,
                $width,
            ],
            'min' => '',
            'max' => '',
        ],
        'button' => [
            'name' => 'button',
            'label' => 'Pulsante di invio',
            'display' => 'block',
            'sub_fields' => [
            $text,
            $width,
            ],
            'min' => '',
            'max' => '',
        ],
        ],
        'button_label' => 'Aggiungi Campo',
        'min' => '',
        'max' => '',
    ],
    [
        'label' => 'Contenuto Mail',
        'name' => 'content_mail',
        'type' => 'textarea',
        'instructions' => 'Inserire il contenuto della mail che arriverà all\'amministratore del sito oppure alla mail in alto, se inserita.<br>
        Richiamare i campi con le parentesi quadre []<br>
        Ad esempio, se ho creato un campo che ha come nome "telefono", lo posso richiamare con la stringa "[telefono]"',
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
]);

