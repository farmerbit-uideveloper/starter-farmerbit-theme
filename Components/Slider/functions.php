<?php

namespace Flynt\Components\Slider;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Slider',
		'name' => 'slider',
        'sub_fields' => getSubFields()
    ];
}

/**
 * Sub Component inside a Standard Component
 *
 * @param boolean $suffix
 * @return void
 */
function getSubComponent( $suffix = false, $options = true )
{  
	$suffix = $suffix ? '_' . $suffix : '';

  	return [
		'label' => 'Slider (sub)',
		'name' => 'subCompSlider' . $suffix,
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
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
		$options ? [
			'label' => 'galleria immagini',
			'name' => 'gallery',
			'type' => 'gallery',
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
			'insert' => 'append',
			'library' => 'all',
			'min' => '',
			'max' => '',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		] : [],
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
				[
					'label' => 'Enable Autoplay',
					'name' => 'autoplay',
					'type' => 'true_false',
					'default_value' => 0,
					'ui' => 1
				],
				[
					'label' => 'Autoplay Speed (in milliseconds)',
					'name' => 'autoplaySpeed',
					'type' => 'number',
					'min' => 300,
					'step' => 1,
					'default_value' => 4000,
					'required' => 1,
					'conditional_logic' => [
						[
							[
								'fieldPath' => 'autoplay',
								'operator' => '==',
								'value' => 1
							]
						]
					],
				],
				FieldVariables\getSectionId(),
				FieldVariables\getSectionClasses(),
				FieldVariables\getContainer(),
				FieldVariables\getRow(),
				FieldVariables\getColsClasses(),
				FieldVariables\getItemClasses(),
			]
		] : [],
	];
}
