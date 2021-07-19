<?php

namespace Flynt\Components\Button;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

// add_filter('Flynt/addComponentData?name=Button', function ($data) {
//     return $data;
// });

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Button',
		'name' => 'button',
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
		'label' => 'Button (sub)',
		'name' => 'subCompButton' . $suffix,
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
		'sub_fields' => getSubFields( $options )
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
		$options ? [
			'label' => 'General',
			'name' => 'generalTab',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		] : [],
		[
			'label' => 'Button',
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
				FieldVariables\getContainer(),
				FieldVariables\getItemClasses(),
			]
		] : [],
	];
}