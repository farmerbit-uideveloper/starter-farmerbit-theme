<?php

namespace Flynt\Components\Title;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

// add_filter('Flynt/addComponentData?name=Title', function ($data) {
//     return $data;
// });

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Titolo',
		'name' => 'title',
        'sub_fields' => getSubFields()
    ];
}

/**
 * Sub Component inside a Standard Component
 *
 * @param boolean $suffix
 * @return void
 */
function getSubComponent( $suffix = false )
{  
	$suffix = $suffix ? '_' . $suffix : '';

  	return [
		'label' => 'Titolo (sub)',
		'name' => 'subCompTitle' . $suffix,
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'layout' => 'block',
		'sub_fields' => getSubFields()
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
			'label' => 'General',
			'name' => 'generalTab',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		],
		[
			'label' => 'Title Alignment',
			'name' => 'titleAlignment',
			'type' => 'button_group',
			'choices' => [
				'text-left' 	=> '<i class="dashicons dashicons-editor-alignleft" title="Align text left"></i>',
				'text-center' 	=> '<i class="dashicons dashicons-editor-aligncenter" title="Align text center"></i>',
				'text-right' 	=> '<i class="dashicons dashicons-editor-alignright" title="Align text right"></i>',
				'text-justify' 	=> '<i class="dashicons dashicons-editor-justify" title="Justify text"></i>'
			],
			'default_value' => ''
		],
		[
			'label' => 'Heading tag',
			'name' => 'titleType',
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
					0 => 'h1',
				],
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		],
		[
			'label' => 'Title',
			'name' => 'titleHtml',
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
				FieldVariables\getColsClasses(),
				FieldVariables\getContainer(),
				FieldVariables\getRow(),
				FieldVariables\getItemClasses(),
				FieldVariables\getTheme(),
			]
		] : [],
	];
}