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

	global $paged;
	if (!isset($paged) || !$paged){
		$paged = 1;
	}

	$args = array(
		'post_type'       => $data['postTypeSelect'],
		'nopaging'        => false,
		'paged'           => $paged,
		'posts_per_page'  => $data['postsPerPage'] ?? '-1',
		'post_status'     => 'publish',
		'offset'		  => $data['offset'] ? $data['offset'] - 1 : 0,
	);

	if( isset( $data['terms'] ) && $data['terms'] !== '' ) :
		$terms = explode( ',', $data['terms'] );
	elseif ( is_tax() && $data['terms'] === '' ) :
		$qo = get_queried_object();
		$terms = isset( $qo->term_id ) ? $qo->term_id : false;
	elseif ( isset( $_GET['term'] ) && is_numeric( $_GET['term'] ) ) :
		$terms = $_GET['term'];
	else:
		$terms = false;
	endif;

	if( is_singular() ) {
		$args['post__not_in'] = [ get_the_ID() ];
	}

	if( is_home() && $terms ) {
		$args['category'] = $terms;
	}

	if( ! is_home() && $terms ) :
		$args['tax_query'] = [
			[
				'taxonomy' => $data['taxSelect'],
				'field'    => 'term_id',
				'terms'    => $terms,
			],
		];
	endif;

	$data['queryPosts'] = new Timber\PostQuery( $args );

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
				'instructions' => 'term ids separated by comma.<br> Empty try to get posts from current term',
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
				'label' => 'Pagination On/Off',
				'name' => 'hasPagination',
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
			[
				'label' => 'Posts per page',
				'name' => 'postsPerPage',
				'type' => 'range',
				'instructions' => '0 = ottiene tutto  |  <b>Per blog settare valore sotto anche <a target="_blank" href="' . get_admin_url() . 'options-reading.php">QUI</a></b>',
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
				'label' => 'Offset',
				'name' => 'offset',
				'type' => 'range',
				'instructions' => '(es: con valore "2" parte dal terzo elemento)',
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
				]
			]
        ]
    ];
}