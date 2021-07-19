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
        'name'                       => _x('Creations Categories', 'Creations Category General Name', 'uideveloper'),
        'singular_name'              => _x('Creations Category', 'Creations Category Singular Name', 'uideveloper'),
        'menu_name'                  => __('Creations Category', 'uideveloper'),
        'all_items'                  => __('All Creations Categories', 'uideveloper'),
        'parent_item'                => __('Parent Creations Category', 'uideveloper'),
        'parent_item_colon'          => __('Parent Creations Category:', 'uideveloper'),
        'new_item_name'              => __('New Creations Category Name', 'uideveloper'),
        'add_new_item'               => __('Add New Creations Category', 'uideveloper'),
        'edit_item'                  => __('Edit Creations Category', 'uideveloper'),
        'update_item'                => __('Update Creations Category', 'uideveloper'),
        'view_item'                  => __('View Creations Category', 'uideveloper'),
        'separate_items_with_commas' => __('Separate Creations Categories with commas', 'uideveloper'),
        'add_or_remove_items'        => __('Add or remove Creations Categories', 'uideveloper'),
        'choose_from_most_used'      => __('Choose from the most used', 'uideveloper'),
        'popular_items'              => __('Popular Creations Categories', 'uideveloper'),
        'search_items'               => __('Search Creations Categories', 'uideveloper'),
        'not_found'                  => __('Not Found', 'uideveloper'),
        'no_terms'                   => __('No Creations Categories', 'uideveloper'),
        'items_list'                 => __('Creations Categories list', 'uideveloper'),
        'items_list_navigation'      => __('Creations Categories list navigation', 'uideveloper'),
	];
	$rewrite = array(
		'slug'                  => __( 'creations-category', 'uideveloper' ),
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

    register_taxonomy('uideveloper_creation_cat', ['uideveloper_creation', 'uideveloper_brand'], $args);
}

add_action('init', 'Flynt\\CustomTaxonomies\\registerCreationCatTaxonomy');
