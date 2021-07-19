<?php

/**
 * This is an example file showcasing how you can add custom post types to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Flynt\CustomPostTypes;

// function registerExamplePostType()
// {
//     $labels = [
//         'name'                  => _x('Post Types', 'Post Type General Name', 'abitha'),
//         'singular_name'         => _x('Post Type', 'Post Type Singular Name', 'abitha'),
//         'menu_name'             => __('Post Types', 'abitha'),
//         'name_admin_bar'        => __('Post Type', 'abitha'),
//         'archives'              => __('Item Archives', 'abitha'),
//         'attributes'            => __('Item Attributes', 'abitha'),
//         'parent_item_colon'     => __('Parent Item:', 'abitha'),
//         'all_items'             => __('All Items', 'abitha'),
//         'add_new_item'          => __('Add New Item', 'abitha'),
//         'add_new'               => __('Add New', 'abitha'),
//         'new_item'              => __('New Item', 'abitha'),
//         'edit_item'             => __('Edit Item', 'abitha'),
//         'update_item'           => __('Update Item', 'abitha'),
//         'view_item'             => __('View Item', 'abitha'),
//         'view_items'            => __('View Items', 'abitha'),
//         'search_items'          => __('Search Item', 'abitha'),
//         'not_found'             => __('Not found', 'abitha'),
//         'not_found_in_trash'    => __('Not found in Trash', 'abitha'),
//         'featured_image'        => __('Featured Image', 'abitha'),
//         'set_featured_image'    => __('Set featured image', 'abitha'),
//         'remove_featured_image' => __('Remove featured image', 'abitha'),
//         'use_featured_image'    => __('Use as featured image', 'abitha'),
//         'insert_into_item'      => __('Insert into item', 'abitha'),
//         'uploaded_to_this_item' => __('Uploaded to this item', 'abitha'),
//         'items_list'            => __('Items list', 'abitha'),
//         'items_list_navigation' => __('Items list navigation', 'abitha'),
//         'filter_items_list'     => __('Filter items list', 'abitha'),
//     ];
//     $args = [
//         'label'                 => __('Post Type', 'abitha'),
//         'description'           => __('Post Type Description', 'abitha'),
//         'labels'                => $labels,
//         'supports'              => ['title', 'editor', 'revisions'],
//         'taxonomies'            => ['category', 'post_tag'],
//         'hierarchical'          => false,
//         'public'                => true,
//         'show_ui'               => true,
//         'show_in_menu'          => true,
//         'menu_position'         => 5,
//         'show_in_admin_bar'     => true,
//         'show_in_nav_menus'     => true,
//         'can_export'            => true,
//         'has_archive'           => true,
//         'exclude_from_search'   => false,
//         'publicly_queryable'    => true,
//         'capability_type'       => 'page',
//     ];
//     register_post_type('example', $args);
// }

// add_action('init', '\\Flynt\\CustomPostTypes\\registerExamplePostType');
