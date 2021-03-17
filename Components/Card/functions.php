<?php

namespace Flynt\Components\Card;

use Flynt\FieldVariables;
use Flynt\Utils\Options;


add_filter('Flynt/addComponentData?name=Card', function ($data) {

    return $data;

});

/**
 *  For flynt ACF Flexible Content
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
 *  For create Sub Component inside a Standard Component (Molecole)
 */
function getSubComponent( $suffix = false )
{  
	$suffix = $suffix ? '_' . $suffix : '';

  	return [
		'label' => 'Cartd (sub)',
		'name' => 'subCompCard' . $suffix,
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
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
 *  For sharing same sub fields with both getACFLayout and getSubComponent
 */
function getSubFields( $subComp = false ) {

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
				FieldVariables\getColsClasses( $subComp ),
				FieldVariables\getItemClasses( $subComp ),
				FieldVariables\getTheme( $subComp ),
			]
		],
	];
}