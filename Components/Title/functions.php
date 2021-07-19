<?php

namespace Flynt\Components\Title;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Flynt\Components;
use Timber;

add_filter('Flynt/addComponentData?name=Title', function ($data) {

	if( $data['wpTitle'] ) :
		if ( is_tax() ) :
			$data['title'] = single_term_title('', false);
		elseif ( is_home() ) :
			$context = Timber::get_context();
			$data['title'] = $context['wp_title'];
		else:
			$data['title'] = get_the_title();
		endif;
	else:
		$data['title'] = $data['titleHtml'];
	endif;

    return $data;
});

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
function getSubComponent( $suffix = false, $options = true )
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
			'label' => 'Usa titolo originale',
			'name' => 'wpTitle',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'wrapper' => 
			[
			  'width' => '',
			  'class' => '',
			  'id' => '',
			],
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
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
			'conditional_logic' => [
				[
					[
						'fieldPath' => 'wpTitle',
						'operator' => '==',
						'value' => '0',
					],
				],
			],
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
			'label' => 'Subtitle On/Off',
			'name' => 'hasSubtitle',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'wrapper' => 
			[
			  'width' => '',
			  'class' => '',
			  'id' => '',
			],
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		],
		Components\Subtitle\getSubComponent(false, true, [
			'fieldPath' => 'hasSubtitle',
			'operator' => '==',
			'value' => '1',
		]),
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