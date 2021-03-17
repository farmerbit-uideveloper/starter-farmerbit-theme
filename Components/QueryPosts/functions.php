<?php

namespace Flynt\Components\QueryPosts;

use Flynt\ComponentManager;
use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber;

function getComponentsList() {
	$componentManager = ComponentManager::getInstance();
	$componentsList = $componentManager->getAll();
	$componentsListClean = [];

	if( ! empty( $componentsList ) && is_array( $componentsList ) ) {
		foreach ($componentsList as $key => $component) {
			$componentsListClean[$key] = $key;
		}
	}

	$list = ! empty( $componentsListClean ) ? $componentsListClean : false;

	return $list;
}


add_filter('Flynt/addComponentData?name=QueryPosts', function ($data) {

	$args = array(
		'post_type'       => $data['postTypeSelect'],
		'posts_per_page'  => $data['postsPerPage'] ?? '-1',
		'post_status'     => 'publish',
	);

	$terms = isset( $data['terms'] ) && $data['terms'] !== '' ? explode( ',', $data['terms'] ) : false;

	if( $data['taxSelect'] && $terms ) :
		$args['tax_query'] = [
			[
				'taxonomy' => $data['taxSelect'],
				'field'    => 'term_id',
				'terms'    => $terms,
			],
		];
	endif;

	$data['queryPosts'] = Timber::get_posts( $args );

    return $data;

});

function getACFLayout()
{

    return [
        'label' => 'Query Posts',
        'name' => 'QueryPosts',
		'sub_fields' => [
            [
                'label' => 'General',
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
			],
			[
                'label' => 'Select post type',
                'name' => 'postTypeSelect',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                'choices' => getPostTypes(),
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
                'label' => 'Select taxonomies',
                'name' => 'taxSelect',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                'choices' => getTaxonomies(),
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
				'label' => 'Set terms',
				'name' => 'terms',
				'type' => 'text',
				'instructions' => 'term ids separated by comma',
				'required' => 0,
				'conditional_logic' => [
                    [
                        [
                            "fieldPath" => "taxSelect",
                            "operator" => "!=",
                            "value" => '0'
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
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			],
			[
                'label' => 'Select component to pass query result',
                'name' => 'compSelect',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                'choices' => getComponentsList(),
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
				'label' => 'Posts per page',
				'name' => 'postsPerPage',
				'type' => 'range',
				'instructions' => '0 get all posts available',
				'required' => 0,
				'wrapper' => 
				[
				  'width' => '',
				  'class' => '',
				  'id' => '',
				],
				'default_value' => '',
				'min' => '',
				'max' => '',
				'step' => '',
				'prepend' => '',
				'append' => '',
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
					FieldVariables\getSectionClasses(),
					FieldVariables\getContainer(),
					FieldVariables\getRow(),
					FieldVariables\getColsClasses(),
					FieldVariables\getItemClasses(),
					FieldVariables\getTheme(),
				]
			]
        ]
    ];
}