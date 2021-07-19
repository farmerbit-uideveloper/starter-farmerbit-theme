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
        'name'                  => _x('Creations', 'Post Type General Name', 'uideveloper'),
        'singular_name'         => _x('Creation', 'Post Type Singular Name', 'uideveloper'),
        'menu_name'             => __('Creations', 'uideveloper'),
        'name_admin_bar'        => __('Creation', 'uideveloper'),
        'archives'              => __('Creation Archives', 'uideveloper'),
        'attributes'            => __('Creation Attributes', 'uideveloper'),
        'parent_item_colon'     => __('Parent Creation:', 'uideveloper'),
        'all_items'             => __('All Creations', 'uideveloper'),
        'add_new_item'          => __('Add New Creation', 'uideveloper'),
        'add_new'               => __('Add New', 'uideveloper'),
        'new_item'              => __('New Creation', 'uideveloper'),
        'edit_item'             => __('Edit Creation', 'uideveloper'),
        'update_item'           => __('Update Creation', 'uideveloper'),
        'view_item'             => __('View Creation', 'uideveloper'),
        'view_items'            => __('View Creations', 'uideveloper'),
        'search_items'          => __('Search Creation', 'uideveloper'),
        'not_found'             => __('Not found', 'uideveloper'),
        'not_found_in_trash'    => __('Not found in Trash', 'uideveloper'),
        'featured_image'        => __('Featured Image', 'uideveloper'),
        'set_featured_image'    => __('Set featured image', 'uideveloper'),
        'remove_featured_image' => __('Remove featured image', 'uideveloper'),
        'use_featured_image'    => __('Use as featured image', 'uideveloper'),
        'insert_into_item'      => __('Insert into creation', 'uideveloper'),
        'uploaded_to_this_item' => __('Uploaded to this creation', 'uideveloper'),
        'items_list'            => __('Creations list', 'uideveloper'),
        'items_list_navigation' => __('Creations list navigation', 'uideveloper'),
        'filter_items_list'     => __('Filter creations list', 'uideveloper'),
    ];
	
	$rewrite = [
		'slug'                  => __( 'creation', 'uideveloper' ),
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	];

    $args = [
        'label'                 => __('Creation', 'uideveloper'),
        'description'           => __('', 'uideveloper'),
        'labels'                => $labels,
        'supports'              => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes'],
        'taxonomies'            => ['uideveloper_creation_cat'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => __('creations', 'uideveloper'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    ];
    register_post_type('uideveloper_creation', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerCreationPostType');