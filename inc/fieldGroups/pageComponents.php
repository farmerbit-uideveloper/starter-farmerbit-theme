<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => 'Contenuto pagina',
		'style' => 'seamless',
		'default closed' =>	__("Standard Collapsed",'abitha'), // FC default collapsed
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Contenuto pagina', 'abitha'),
                'type' => 'flexible_content',
                'button_label' => __('Aggiungi blocco', 'abitha'),
                'layouts' => [
					Components\Breadcrumbs\getACFLayout(),
					Components\HeroSlider\getACFLayout(),
					Components\Title\getACFLayout(),
					Components\Description\getACFLayout(),
					Components\Image\getACFLayout(),
					Components\Brand\getACFLayout(),
					Components\Card\getACFLayout(),
					Components\Info\getACFLayout(),
					Components\Button\getACFLayout(),
					Components\Carousel\getACFLayout(),
					Components\Gallery\getACFLayout(),
					Components\Instagram\getACFLayout(),
					Components\Form\getACFLayout(),
                    Components\GoogleMaps\getACFLayout(),
					Components\QueryPosts\getACFLayout(),
					Components\QueryTerms\getACFLayout(),
					Components\QueryTermsPost\getACFLayout(),
					Components\ListItems\getACFLayout(),
				]
            ]
        ],
        'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post'
				]
			],
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'abitha_creation'
				]
			],
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page'
				]
			],
			[
				[
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'abitha_creation_cat'
				]
			],
		],
		'menu_order' => 1,
		'hide_on_screen' => [
			0 => 'the_content',
		],
    ]);

});