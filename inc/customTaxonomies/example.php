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
//         'name'                       => _x('Taxonomies', 'Taxonomy General Name', 'uideveloper'),
//         'singular_name'              => _x('Taxonomy', 'Taxonomy Singular Name', 'uideveloper'),
//         'menu_name'                  => __('Taxonomy', 'uideveloper'),
//         'all_items'                  => __('All Items', 'uideveloper'),
//         'parent_item'                => __('Parent Item', 'uideveloper'),
//         'parent_item_colon'          => __('Parent Item:', 'uideveloper'),
//         'new_item_name'              => __('New Item Name', 'uideveloper'),
//         'add_new_item'               => __('Add New Item', 'uideveloper'),
//         'edit_item'                  => __('Edit Item', 'uideveloper'),
//         'update_item'                => __('Update Item', 'uideveloper'),
//         'view_item'                  => __('View Item', 'uideveloper'),
//         'separate_items_with_commas' => __('Separate items with commas', 'uideveloper'),
//         'add_or_remove_items'        => __('Add or remove items', 'uideveloper'),
//         'choose_from_most_used'      => __('Choose from the most used', 'uideveloper'),
//         'popular_items'              => __('Popular Items', 'uideveloper'),
//         'search_items'               => __('Search Items', 'uideveloper'),
//         'not_found'                  => __('Not Found', 'uideveloper'),
//         'no_terms'                   => __('No items', 'uideveloper'),
//         'items_list'                 => __('Items list', 'uideveloper'),
//         'items_list_navigation'      => __('Items list navigation', 'uideveloper'),
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
