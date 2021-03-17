<?php

/**
 * This is an example file showcasing how you can add custom taxonomies to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_taxonomy/ or use https://generatewp.com/taxonomy/ to generate the code for you.
 */

namespace Flynt\CustomTaxonomies;

function registerUideveloperProjectCatTaxonomy()
{
    $labels = [
        'name'                       => _x('Projects Categories', 'Projects Category General Name', 'uideveloper'),
        'singular_name'              => _x('Projects Category', 'Projects Category Singular Name', 'uideveloper'),
        'menu_name'                  => __('Projects Category', 'uideveloper'),
        'all_items'                  => __('All Projects Categories', 'uideveloper'),
        'parent_item'                => __('Parent Projects Category', 'uideveloper'),
        'parent_item_colon'          => __('Parent Projects Category:', 'uideveloper'),
        'new_item_name'              => __('New Projects Category Name', 'uideveloper'),
        'add_new_item'               => __('Add New Projects Category', 'uideveloper'),
        'edit_item'                  => __('Edit Projects Category', 'uideveloper'),
        'update_item'                => __('Update Projects Category', 'uideveloper'),
        'view_item'                  => __('View Projects Category', 'uideveloper'),
        'separate_items_with_commas' => __('Separate Projects Categories with commas', 'uideveloper'),
        'add_or_remove_items'        => __('Add or remove Projects Categories', 'uideveloper'),
        'choose_from_most_used'      => __('Choose from the most used', 'uideveloper'),
        'popular_items'              => __('Popular Projects Categories', 'uideveloper'),
        'search_items'               => __('Search Projects Categories', 'uideveloper'),
        'not_found'                  => __('Not Found', 'uideveloper'),
        'no_terms'                   => __('No Projects Categories', 'uideveloper'),
        'items_list'                 => __('Projects Categories list', 'uideveloper'),
        'items_list_navigation'      => __('Projects Categories list navigation', 'uideveloper'),
	];
	$rewrite = array(
		'slug'                  => __( 'projects-category', 'uideveloper' ),
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'               	 => $rewrite,
    ];

    register_taxonomy('uideveloper_project_cat', ['uideveloper_project'], $args);
}

add_action('init', 'Flynt\\CustomTaxonomies\\registerUideveloperProjectCatTaxonomy');
