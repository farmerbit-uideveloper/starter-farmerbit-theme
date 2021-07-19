<?php

/**
 * This is an example file showcasing how you can add custom taxonomies to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_taxonomy/ or use https://generatewp.com/taxonomy/ to generate the code for you.
 */

namespace Flynt\CustomTaxonomies;

function registerCreationCatTaxonomy()
{
    $labels = [
        'name'                       => _x('Creations Categories', 'Creations Category General Name', 'abitha'),
        'singular_name'              => _x('Creations Category', 'Creations Category Singular Name', 'abitha'),
        'menu_name'                  => __('Creations Category', 'abitha'),
        'all_items'                  => __('All Creations Categories', 'abitha'),
        'parent_item'                => __('Parent Creations Category', 'abitha'),
        'parent_item_colon'          => __('Parent Creations Category:', 'abitha'),
        'new_item_name'              => __('New Creations Category Name', 'abitha'),
        'add_new_item'               => __('Add New Creations Category', 'abitha'),
        'edit_item'                  => __('Edit Creations Category', 'abitha'),
        'update_item'                => __('Update Creations Category', 'abitha'),
        'view_item'                  => __('View Creations Category', 'abitha'),
        'separate_items_with_commas' => __('Separate Creations Categories with commas', 'abitha'),
        'add_or_remove_items'        => __('Add or remove Creations Categories', 'abitha'),
        'choose_from_most_used'      => __('Choose from the most used', 'abitha'),
        'popular_items'              => __('Popular Creations Categories', 'abitha'),
        'search_items'               => __('Search Creations Categories', 'abitha'),
        'not_found'                  => __('Not Found', 'abitha'),
        'no_terms'                   => __('No Creations Categories', 'abitha'),
        'items_list'                 => __('Creations Categories list', 'abitha'),
        'items_list_navigation'      => __('Creations Categories list navigation', 'abitha'),
	];
	$rewrite = array(
		'slug'                  => __( 'creations-category', 'abitha' ),
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
    $args = [
        'labels'                => $labels,
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'rewrite'              	=> $rewrite,
    ];

    register_taxonomy('abitha_creation_cat', ['abitha_creation', 'abitha_brand'], $args);
}

add_action('init', 'Flynt\\CustomTaxonomies\\registerCreationCatTaxonomy');
