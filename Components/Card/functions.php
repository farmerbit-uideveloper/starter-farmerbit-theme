<?php

namespace Flynt\Components\Card;

use Flynt\FieldVariables;
use Flynt\Utils\Options;


add_filter('Flynt/addComponentData?name=Card', function ($data) {

    return $data;

});

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Card',
		'name' => 'card',
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'layout' => 'block',
        'sub_fields' => getSubFields()
    ];
}

/**
 * Sub Component inside a Standard Component
 *
 * @param boolean $suffix
 * @return void
 */
function getSubComponent( $suffix = false, $options = true, $conditional = false )
{  
	$suffix = $suffix ? '_' . $suffix : '';

  	return [
		'label' => '',
		'name' => 'subCompCard' . $suffix,
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => $conditional ? [
			[
				$conditional
			]
		]
		: [],
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'layout' => 'block',
		'sub_fields' => getSubFields( true )
  	];  

}

/**
 * Sharing subfields between Sub Component and ACF Layout
 *
 * @param boolean $options : false hide options tab & fields
 * @return void
 */
function getSubFields( $options = true ) {

	return [
		[
			'label' => 'Block',
			'name' => 'generalTab',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'label' => 'Immagine',
			'name' => 'image',
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
		],
		[
			'label' => 'Titolo',
			'name' => 'title',
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
			'label' => 'Excerpt',
			'name' => 'excerptHtml',
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
			'label' => 'Link',
			'name' => 'link',
			'type' => 'link',
			'instructions' => '',
			'required' => 0,
			'wrapper' => 
			[
			  'width' => '',
			  'class' => '',
			  'id' => '',
			],
			'return_format' => 'array',
		],
		$options ? [
			'label' => 'Options',
			'name' => 'optionsTab',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0
		] : [],
		$options ? [
			'label' => '',
			'name' => 'options',
			'type' => 'group',
			'layout' => 'row',
			'sub_fields' => [
				FieldVariables\getSectionId(),
				FieldVariables\getSectionClasses(),
				FieldVariables\getColsClasses(),
				FieldVariables\getContainer(),
				FieldVariables\getRow(),
				FieldVariables\getItemClasses(),
			]
		] : [],
	];
}