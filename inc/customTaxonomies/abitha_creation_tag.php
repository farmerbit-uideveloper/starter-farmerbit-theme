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
        'name'                       => _x('Creations Tags', 'Creations Tag General Name', 'uideveloper'),
        'singular_name'              => _x('Creations Tag', 'Creations Tag Singular Name', 'uideveloper'),
        'menu_name'                  => __('Creations Tag', 'uideveloper'),
        'all_items'                  => __('All Creations Tags', 'uideveloper'),
        'parent_item'                => __('Parent Creations Tag', 'uideveloper'),
        'parent_item_colon'          => __('Parent Creations Tag:', 'uideveloper'),
        'new_item_name'              => __('New Creations Tag Name', 'uideveloper'),
        'add_new_item'               => __('Add New Creations Tag', 'uideveloper'),
        'edit_item'                  => __('Edit Creations Tag', 'uideveloper'),
        'update_item'                => __('Update Creations Tag', 'uideveloper'),
        'view_item'                  => __('View Creations Tag', 'uideveloper'),
        'separate_items_with_commas' => __('Separate Creations Tags with commas', 'uideveloper'),
        'add_or_remove_items'        => __('Add or remove Creations Tags', 'uideveloper'),
        'choose_from_most_used'      => __('Choose from the most used', 'uideveloper'),
        'popular_items'              => __('Popular Creations Tags', 'uideveloper'),
        'search_items'               => __('Search Creations Tags', 'uideveloper'),
        'not_found'                  => __('Not Found', 'uideveloper'),
        'no_terms'                   => __('No Creations Tags', 'uideveloper'),
        'items_list'                 => __('Creations Tags list', 'uideveloper'),
        'items_list_navigation'      => __('Creations Tags list navigation', 'uideveloper'),
	];
	$rewrite = array(
		'slug'                  => __( 'creations-tag', 'uideveloper' ),
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

    register_taxonomy('uideveloper_creation_tag', ['uideveloper_creation'], $args);
}

add_action('init', 'Flynt\\CustomTaxonomies\\registerCreationTagTaxonomy');
