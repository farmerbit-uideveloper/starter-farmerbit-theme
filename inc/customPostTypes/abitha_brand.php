<?php

/**
 * This is an example file showcasing how you can add custom post types to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Flynt\CustomPostTypes;

function registerBrandPostType()
{
    $labels = [
        'name'                  => _x('Brands', 'Post Type General Name', 'abitha'),
        'singular_name'         => _x('Brand', 'Post Type Singular Name', 'abitha'),
        'menu_name'             => __('Brands', 'abitha'),
        'name_admin_bar'        => __('Brand', 'abitha'),
        'archives'              => __('Brand Archives', 'abitha'),
        'attributes'            => __('Brand Attributes', 'abitha'),
        'parent_item_colon'     => __('Parent Brand:', 'abitha'),
        'all_items'             => __('All Brands', 'abitha'),
        'add_new_item'          => __('Add New Brand', 'abitha'),
        'add_new'               => __('Add New', 'abitha'),
        'new_item'              => __('New Brand', 'abitha'),
        'edit_item'             => __('Edit Brand', 'abitha'),
        'update_item'           => __('Update Brand', 'abitha'),
        'view_item'             => __('View Brand', 'abitha'),
        'view_items'            => __('View Brands', 'abitha'),
        'search_items'          => __('Search Brand', 'abitha'),
        'not_found'             => __('Not found', 'abitha'),
        'not_found_in_trash'    => __('Not found in Trash', 'abitha'),
        'featured_image'        => __('Featured Image', 'abitha'),
        'set_featured_image'    => __('Set featured image', 'abitha'),
        'remove_featured_image' => __('Remove featured image', 'abitha'),
        'use_featured_image'    => __('Use as featured image', 'abitha'),
        'insert_into_item'      => __('Insert into brand', 'abitha'),
        'uploaded_to_this_item' => __('Uploaded to this brand', 'abitha'),
        'items_list'            => __('Brands list', 'abitha'),
        'items_list_navigation' => __('Brands list navigation', 'abitha'),
        'filter_items_list'     => __('Filter brands list', 'abitha'),
    ];
    $args = [
        'label'                 => __('Brand', 'abitha'),
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
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ];
    register_post_type('abitha_brand', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerBrandPostType');