<?php

namespace Flynt\Components\Description;

use Flynt\FieldVariables;
use Flynt\Utils\Options;


add_filter('Flynt/addComponentData?name=Description', function ($data) {

    return $data;

});

/**
 *  For flynt ACF Flexible Content
 */
function getACFLayout() {
    return [
		'label' => 'Description',
		'name' => 'description',
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
		'label' => 'Description (sub)',
		'name' => 'subCompDescription' . $suffix,
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
function getSubFields() {

	return [
		[
			'label' => 'Block',
			'name' => 'generalTab',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
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
			  'class' => '',
			  'id' => '',
			],
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
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
		],
	];
}