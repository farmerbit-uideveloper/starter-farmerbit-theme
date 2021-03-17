<?php

namespace Flynt\Components\QueryTerms;

use Flynt\ComponentManager;
use Flynt\FieldVariables;
use Flynt\Utils\Options;

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


add_filter('Flynt/addComponentData?name=QueryTerms', function ($data) {
	
	$tax_select = $data['taxSelect'];

	$terms = get_terms( array(
		'taxonomy' => $tax_select,
		'hide_empty' => true,
	) );

	if( ! empty( $terms ) && ! is_wp_error( $terms ) ) :

		$data['queryTerms'] = $terms;

	endif;

    return $data;

});

// function getPostTypes() {
// 	global $wpdb;
// 	$post_types = $wpdb->get_col( "SELECT DISTINCT post_type FROM $wpdb->posts" );

// 	foreach ($post_types as $key => $post_type) {
// 		if( $post_type === 'revision' || $post_type === 'customize_changeset' ) {
// 			unset( $post_types[ $key ] ); 
// 		}
// 	}

// 	return $post_types;
// } 


function getACFLayout()
{

    return [
        'label' => 'Query Terms',
        'name' => 'QueryTerms',
		'sub_fields' => [
            [
                'label' => 'General',
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
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