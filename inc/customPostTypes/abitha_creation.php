<?php

/**
 * This is an example file showcasing how you can add custom post types to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Flynt\CustomPostTypes;

function registerCreationPostType()
{
    $labels = [
        'name'                  => _x('Creations', 'Post Type General Name', 'abitha'),
        'singular_name'         => _x('Creation', 'Post Type Singular Name', 'abitha'),
        'menu_name'             => __('Creations', 'abitha'),
        'name_admin_bar'        => __('Creation', 'abitha'),
        'archives'              => __('Creation Archives', 'abitha'),
        'attributes'            => __('Creation Attributes', 'abitha'),
        'parent_item_colon'     => __('Parent Creation:', 'abitha'),
        'all_items'             => __('All Creations', 'abitha'),
        'add_new_item'          => __('Add New Creation', 'abitha'),
        'add_new'               => __('Add New', 'abitha'),
        'new_item'              => __('New Creation', 'abitha'),
        'edit_item'             => __('Edit Creation', 'abitha'),
        'update_item'           => __('Update Creation', 'abitha'),
        'view_item'             => __('View Creation', 'abitha'),
        'view_items'            => __('View Creations', 'abitha'),
        'search_items'          => __('Search Creation', 'abitha'),
        'not_found'             => __('Not found', 'abitha'),
        'not_found_in_trash'    => __('Not found in Trash', 'abitha'),
        'featured_image'        => __('Featured Image', 'abitha'),
        'set_featured_image'    => __('Set featured image', 'abitha'),
        'remove_featured_image' => __('Remove featured image', 'abitha'),
        'use_featured_image'    => __('Use as featured image', 'abitha'),
        'insert_into_item'      => __('Insert into creation', 'abitha'),
        'uploaded_to_this_item' => __('Uploaded to this creation', 'abitha'),
        'items_list'            => __('Creations list', 'abitha'),
        'items_list_navigation' => __('Creations list navigation', 'abitha'),
        'filter_items_list'     => __('Filter creations list', 'abitha'),
    ];
	
	$rewrite = [
		'slug'                  => __( 'creation', 'abitha' ),
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	];

    $args = [
        'label'                 => __('Creation', 'abitha'),
        'description'           => __('', 'abitha'),
        'labels'                => $labels,
        'supports'              => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes'],
        'taxonomies'            => ['abitha_creation_cat'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => __('creations', 'abitha'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    ];
    register_post_type('abitha_creation', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerCreationPostType');