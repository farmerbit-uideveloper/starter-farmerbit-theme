<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'formComponents',
        'title' => 'Impostazioni form',
		'style' => 'default',
		'default closed' =>	__("Standard Collapsed",'acf'), // FC default collapsed
        'fields' => [
            Components\Form\getACFLayoutPostType(),
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'form'
                ]
            ]
        ]
    ]);
});
