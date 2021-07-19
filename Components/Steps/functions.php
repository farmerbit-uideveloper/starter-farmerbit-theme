<?php

namespace Flynt\Components\Steps;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Flynt\Components;
use Timber;

add_filter('Flynt/addComponentData?name=Steps', function ($data) {
    return $data;
});

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Steps',
		'name' => 'steps',
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
		'label' => 'Steps (sub)',
		'name' => 'subCompSteps' . $suffix,
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
			'label' => 'Processi',
			'name' => 'steps',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
			],
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'row',
			'button_label' => '+ PROCESSO',
			'sub_fields' => [
				0 => [
					'label' => 'Spaziatura superiore',
					'name' => 'paddingTop',
					'type' => 'number',
					'instructions' => 'es: "10" = "100px"',
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
				],
				1 => [
					'label' => 'Numero',
					'name' => 'number',
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
				],
				2 => [
					'label' => 'Titolo',
					'name' => 'title',
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
				],
				3 => [
					'label' => 'Descrizione',
					'name' => 'description',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'wrapper' => [
						'width' => '',
						'class' => 'ui-taller-200',
						'id' => '',
					],
					'default_value' => '',
					'tabs' => 'visual',
					'toolbar' => 'basic',
					'media_upload' => 0,
					'delay' => 0,
				],
			],
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