<?php

namespace Flynt\Components\Spacer;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Flynt\Components;
use Timber;

add_filter('Flynt/addComponentData?name=Spacer', function ($data) {
	$array = explode( ',', $data['spacerClasses'] );
	$spacerClasses = '';

	foreach ($array as $key => $value) {
		$value = trim($value);

		if( $key == 0 ) {
			$spacerClasses .= 'mb-sm-' . $value;
		}

		if( $key == 1 ) {
			$spacerClasses .= ' mb-md-' . $value;
		}

		if( $key == 2 ) {
			$spacerClasses .= ' mb-lg-' . $value;
		}

		if( $key == 3 ) {
			$spacerClasses .= ' mb-xl-' . $value;
		}
	}

	$data['spacerClasses'] = $spacerClasses;

    return $data;
});

/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Spaziatore',
		'name' => 'spacer',
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
		'label' => 'Spaziatore (sub)',
		'name' => 'subCompSpacer' . $suffix,
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
			'label' => 'testo',
			'name' => 'spacerClasses',
			'type' => 'text',
			'instructions' => 'spaziatura verticale ↥ <em>(esempio: 6 = 60px smartphone, 8 = 80px tablet, 10 = 100px desktop)</em>',
			'required' => 0,
			'wrapper' => 
			[
			  'width' => '',
			  'class' => '',
			  'id' => '',
			],
			'default_value' => '6, 8, 10',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
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
				FieldVariables\getColsClasses(),
				FieldVariables\getItemClasses(),
			]
		] : [],
	];
}