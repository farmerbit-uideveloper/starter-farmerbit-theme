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
//         'name'                  => _x('Post Types', 'Post Type General Name', 'uideveloper'),
//         'singular_name'         => _x('Post Type', 'Post Type Singular Name', 'uideveloper'),
//         'menu_name'             => __('Post Types', 'uideveloper'),
//         'name_admin_bar'        => __('Post Type', 'uideveloper'),
//         'archives'              => __('Item Archives', 'uideveloper'),
//         'attributes'            => __('Item Attributes', 'uideveloper'),
//         'parent_item_colon'     => __('Parent Item:', 'uideveloper'),
//         'all_items'             => __('All Items', 'uideveloper'),
//         'add_new_item'          => __('Add New Item', 'uideveloper'),
//         'add_new'               => __('Add New', 'uideveloper'),
//         'new_item'              => __('New Item', 'uideveloper'),
//         'edit_item'             => __('Edit Item', 'uideveloper'),
//         'update_item'           => __('Update Item', 'uideveloper'),
//         'view_item'             => __('View Item', 'uideveloper'),
//         'view_items'            => __('View Items', 'uideveloper'),
//         'search_items'          => __('Search Item', 'uideveloper'),
//         'not_found'             => __('Not found', 'uideveloper'),
//         'not_found_in_trash'    => __('Not found in Trash', 'uideveloper'),
//         'featured_image'        => __('Featured Image', 'uideveloper'),
//         'set_featured_image'    => __('Set featured image', 'uideveloper'),
//         'remove_featured_image' => __('Remove featured image', 'uideveloper'),
//         'use_featured_image'    => __('Use as featured image', 'uideveloper'),
//         'insert_into_item'      => __('Insert into item', 'uideveloper'),
//         'uploaded_to_this_item' => __('Uploaded to this item', 'uideveloper'),
//         'items_list'            => __('Items list', 'uideveloper'),
//         'items_list_navigation' => __('Items list navigation', 'uideveloper'),
//         'filter_items_list'     => __('Filter items list', 'uideveloper'),
//     ];
//     $args = [
//         'label'                 => __('Post Type', 'uideveloper'),
//         'description'           => __('Post Type Description', 'uideveloper'),
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
