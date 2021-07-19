<?php

/**
 * This is an example file showcasing how you can add custom taxonomies to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_taxonomy/ or use https://generatewp.com/taxonomy/ to generate the code for you.
 */

namespace Flynt\CustomTaxonomies;

// function registerExampleTaxonomy()
// {
//     $labels = [
//         'name'                       => _x('Taxonomies', 'Taxonomy General Name', 'abitha'),
//         'singular_name'              => _x('Taxonomy', 'Taxonomy Singular Name', 'abitha'),
//         'menu_name'                  => __('Taxonomy', 'abitha'),
//         'all_items'                  => __('All Items', 'abitha'),
//         'parent_item'                => __('Parent Item', 'abitha'),
//         'parent_item_colon'          => __('Parent Item:', 'abitha'),
//         'new_item_name'              => __('New Item Name', 'abitha'),
//         'add_new_item'               => __('Add New Item', 'abitha'),
//         'edit_item'                  => __('Edit Item', 'abitha'),
//         'update_item'                => __('Update Item', 'abitha'),
//         'view_item'                  => __('View Item', 'abitha'),
//         'separate_items_with_commas' => __('Separate items with commas', 'abitha'),
//         'add_or_remove_items'        => __('Add or remove items', 'abitha'),
//         'choose_from_most_used'      => __('Choose from the most used', 'abitha'),
//         'popular_items'              => __('Popular Items', 'abitha'),
//         'search_items'               => __('Search Items', 'abitha'),
//         'not_found'                  => __('Not Found', 'abitha'),
//         'no_terms'                   => __('No items', 'abitha'),
//         'items_list'                 => __('Items list', 'abitha'),
//         'items_list_navigation'      => __('Items list navigation', 'abitha'),
//     ];
//     $args = [
//         'labels'                     => $labels,
//         'hierarchical'               => false,
//         'public'                     => true,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'show_in_nav_menus'          => true,
//         'show_tagcloud'              => true,
//     ];

//     register_taxonomy('example', ['post'], $args);
// }

// add_action('init', 'Flynt\\CustomTaxonomies\\registerExampleTaxonomy');
