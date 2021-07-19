<?php

namespace Flynt\Components\Subtitle;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Flynt\Components;
use Timber;

add_filter('Flynt/addComponentData?name=Subtitle', function ($data) {
    return $data;
});

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Sottotitolo',
		'name' => 'subtitle',
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
		'label' => 'Sottotitolo (sub)',
		'name' => 'subCompSubtitle' . $suffix,
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
			'label' => 'Alignment',
			'name' => 'subtitleAlignment',
			'type' => 'button_group',
			'choices' => [
				'text-left' 	=> '<i class="dashicons dashicons-editor-alignleft" subtitle="Align text left"></i>',
				'text-center' 	=> '<i class="dashicons dashicons-editor-aligncenter" subtitle="Align text center"></i>',
				'text-right' 	=> '<i class="dashicons dashicons-editor-alignright" subtitle="Align text right"></i>',
				'text-justify' 	=> '<i class="dashicons dashicons-editor-justify" subtitle="Justify text"></i>'
			],
			'default_value' => ''
		],
		[
			'label' => 'Heading tag',
			'name' => 'subtitleType',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'wrapper' => 
				[
					'width' => '',
					'class' => '',
					'id' => '',
				],
			'choices' => 
				[
					'h1' => 'h1',
					'h2' => 'h2',
					'h3' => 'h3',
					'div' => 'div',
					'span' => 'span',
				],
			'default_value' => 
				[
					0 => 'h2',
				],
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		],
		[
			'label' => 'Sottotitolo',
			'name' => 'subtitleHtml',
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