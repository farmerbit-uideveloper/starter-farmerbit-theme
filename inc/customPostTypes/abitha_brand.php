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
        'name'                  => _x('Brands', 'Post Type General Name', 'uideveloper'),
        'singular_name'         => _x('Brand', 'Post Type Singular Name', 'uideveloper'),
        'menu_name'             => __('Brands', 'uideveloper'),
        'name_admin_bar'        => __('Brand', 'uideveloper'),
        'archives'              => __('Brand Archives', 'uideveloper'),
        'attributes'            => __('Brand Attributes', 'uideveloper'),
        'parent_item_colon'     => __('Parent Brand:', 'uideveloper'),
        'all_items'             => __('All Brands', 'uideveloper'),
        'add_new_item'          => __('Add New Brand', 'uideveloper'),
        'add_new'               => __('Add New', 'uideveloper'),
        'new_item'              => __('New Brand', 'uideveloper'),
        'edit_item'             => __('Edit Brand', 'uideveloper'),
        'update_item'           => __('Update Brand', 'uideveloper'),
        'view_item'             => __('View Brand', 'uideveloper'),
        'view_items'            => __('View Brands', 'uideveloper'),
        'search_items'          => __('Search Brand', 'uideveloper'),
        'not_found'             => __('Not found', 'uideveloper'),
        'not_found_in_trash'    => __('Not found in Trash', 'uideveloper'),
        'featured_image'        => __('Featured Image', 'uideveloper'),
        'set_featured_image'    => __('Set featured image', 'uideveloper'),
        'remove_featured_image' => __('Remove featured image', 'uideveloper'),
        'use_featured_image'    => __('Use as featured image', 'uideveloper'),
        'insert_into_item'      => __('Insert into brand', 'uideveloper'),
        'uploaded_to_this_item' => __('Uploaded to this brand', 'uideveloper'),
        'items_list'            => __('Brands list', 'uideveloper'),
        'items_list_navigation' => __('Brands list navigation', 'uideveloper'),
        'filter_items_list'     => __('Filter brands list', 'uideveloper'),
    ];
    $args = [
        'label'                 => __('Brand', 'uideveloper'),
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
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ];
    register_post_type('uideveloper_brand', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerBrandPostType');