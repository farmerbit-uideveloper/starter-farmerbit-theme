<?php

/**
 * This is an example file showcasing how you can add custom post types to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Flynt\CustomPostTypes;

function registerProjectPostType()
{
    $labels = [
        'name'                  => _x('Projects', 'Post Type General Name', 'uideveloper'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'uideveloper'),
        'menu_name'             => __('Projects', 'uideveloper'),
        'name_admin_bar'        => __('Project', 'uideveloper'),
        'archives'              => __('Project Archives', 'uideveloper'),
        'attributes'            => __('Project Attributes', 'uideveloper'),
        'parent_item_colon'     => __('Parent Project:', 'uideveloper'),
        'all_items'             => __('All Projects', 'uideveloper'),
        'add_new_item'          => __('Add New Project', 'uideveloper'),
        'add_new'               => __('Add New', 'uideveloper'),
        'new_item'              => __('New Project', 'uideveloper'),
        'edit_item'             => __('Edit Project', 'uideveloper'),
        'update_item'           => __('Update Project', 'uideveloper'),
        'view_item'             => __('View Project', 'uideveloper'),
        'view_items'            => __('View Projects', 'uideveloper'),
        'search_items'          => __('Search Project', 'uideveloper'),
        'not_found'             => __('Not found', 'uideveloper'),
        'not_found_in_trash'    => __('Not found in Trash', 'uideveloper'),
        'featured_image'        => __('Featured Image', 'uideveloper'),
        'set_featured_image'    => __('Set featured image', 'uideveloper'),
        'remove_featured_image' => __('Remove featured image', 'uideveloper'),
        'use_featured_image'    => __('Use as featured image', 'uideveloper'),
        'insert_into_item'      => __('Insert into project', 'uideveloper'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'uideveloper'),
        'items_list'            => __('Projects list', 'uideveloper'),
        'items_list_navigation' => __('Projects list navigation', 'uideveloper'),
        'filter_items_list'     => __('Filter projects list', 'uideveloper'),
    ];
    $args = [
        'label'                 => __('Project', 'uideveloper'),
        'description'           => __('', 'uideveloper'),
        'labels'                => $labels,
        'supports'              => ['title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes'],
        'taxonomies'            => ['uideveloper_project_cat'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => __('projects', 'uideveloper'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ];
    register_post_type('uideveloper_project', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerProjectPostType');