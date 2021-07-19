<?php

/**
 * This is an example file showcasing how you can add custom taxonomies to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_taxonomy/ or use https://generatewp.com/taxonomy/ to generate the code for you.
 */

namespace Flynt\CustomTaxonomies;

function registerCreationTagTaxonomy()
{
    $labels = [
        'name'                       => _x('Creations Tags', 'Creations Tag General Name', 'abitha'),
        'singular_name'              => _x('Creations Tag', 'Creations Tag Singular Name', 'abitha'),
        'menu_name'                  => __('Creations Tag', 'abitha'),
        'all_items'                  => __('All Creations Tags', 'abitha'),
        'parent_item'                => __('Parent Creations Tag', 'abitha'),
        'parent_item_colon'          => __('Parent Creations Tag:', 'abitha'),
        'new_item_name'              => __('New Creations Tag Name', 'abitha'),
        'add_new_item'               => __('Add New Creations Tag', 'abitha'),
        'edit_item'                  => __('Edit Creations Tag', 'abitha'),
        'update_item'                => __('Update Creations Tag', 'abitha'),
        'view_item'                  => __('View Creations Tag', 'abitha'),
        'separate_items_with_commas' => __('Separate Creations Tags with commas', 'abitha'),
        'add_or_remove_items'        => __('Add or remove Creations Tags', 'abitha'),
        'choose_from_most_used'      => __('Choose from the most used', 'abitha'),
        'popular_items'              => __('Popular Creations Tags', 'abitha'),
        'search_items'               => __('Search Creations Tags', 'abitha'),
        'not_found'                  => __('Not Found', 'abitha'),
        'no_terms'                   => __('No Creations Tags', 'abitha'),
        'items_list'                 => __('Creations Tags list', 'abitha'),
        'items_list_navigation'      => __('Creations Tags list navigation', 'abitha'),
	];
	$rewrite = array(
		'slug'                  => __( 'creations-tag', 'abitha' ),
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
    $args = [
        'labels'                => $labels,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'rewrite'              	=> $rewrite,
    ];

    register_taxonomy('abitha_creation_tag', ['abitha_creation'], $args);
}

add_action('init', 'Flynt\\CustomTaxonomies\\registerCreationTagTaxonomy');
