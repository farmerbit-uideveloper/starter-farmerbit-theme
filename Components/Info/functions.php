<?php

namespace Flynt\Components\Info;

use Flynt\FieldVariables;
use Flynt\Utils\Options;


add_filter('Flynt/addComponentData?name=Info', function ($data) {

    return $data;

});

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Info',
		'name' => 'info',
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'layout' => 'table',
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
		'name' => 'subCompInfo' . $suffix,
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
			'label' => 'Description',
			'name' => 'descriptionHtml',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'wrapper' => 
			[
			  'width' => '',
			  'class' => 'ui-taller-100',
			  'id' => '',
			],
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 1,
			'delay' => 0,
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