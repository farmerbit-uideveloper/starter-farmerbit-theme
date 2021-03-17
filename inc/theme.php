<?php

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    /**
     * Remove type attribute from link and script tags.
     */
    add_theme_support('html5', ['script', 'style']);
});

add_filter('big_image_size_threshold', '__return_false');


// FC
function fc_custom_admin_css()
{

    // $current_user = wp_get_current_user();

    // if( $current_user->user_login != 'someuser' ) :

    ?>

    <style>
        .ui-taller-100 .acf-editor-wrap .wp-editor-area,
        .ui-taller-100 .acf-editor-wrap iframe {
            height: 100px !important;
            min-height: 100px;
        }

        .ui-taller-200 .acf-editor-wrap .wp-editor-area,
        .ui-taller-200 .acf-editor-wrap iframe {
            height: 200px !important;
            min-height: 200px;
        }

        .ui-divider {
            border-top: 3px solid #0086bd !important;
        }
    </style>

    <?php

	// endif;
}
add_action('admin_enqueue_scripts', 'fc_custom_admin_css');


/*--------------------------------------------
Remove gutenberg
--------------------------------------------*/
add_filter('use_block_editor_for_post', '__return_false');

function remove_block_css()
{
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'remove_block_css', 100);





/**
* Check if urls are abs or rel and set atts for each scenario
*
* @param  [type] $url
* @return [type]
*/
function manageUrl($url)
{

    $url_array = explode('/', $url);
    $url_managed = '';

    if ($url_array && ! empty($url_array)) {
        if (in_array('http:', $url_array) || in_array('https:', $url_array)) {
            $url_managed = [ 'url' => $url, 'out' => true ];
        } else {
            $url_managed = [ 'url' => get_home_url('/') . $url, 'out' => false ];
        }
    }

    return $url_managed;
}





/**
*
*  ADMIN STUFF
*
*/

function my_footer_shh()
{
    if (! current_user_can('update_core')) {
        remove_filter('update_footer', 'core_update_footer');
    }
}
add_action('admin_menu', 'my_footer_shh');




function admin_footer_custom()
{
    echo esc_html('&copy; ' . date("Y") . ' - Admin area ' . get_bloginfo('name'));
}
add_filter('admin_footer_text', 'admin_footer_custom');



/*-------------------
for not admin role
--------------------*/
function hide_update_notice_to_all_but_admin_users()
{
    if (!current_user_can('update_core')) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}
add_action('admin_head', 'hide_update_notice_to_all_but_admin_users', 1);



if (!current_user_can('edit_users')) {
    add_action('init', function ($a) {
        return remove_action('init', 'wp_version_check');
    }, 2);
    add_filter('pre_option_update_core', function ($a) {
        return null;
    });
}


function options_general_for_editors() {
    $role = get_role('editor');
    $role->add_cap('edit_theme_options');
    $role->add_cap('manage_options');

    if (! current_user_can('update_core')) {
        remove_menu_page('edit-comments.php');
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_submenu_page('options-general.php', "options-writing.php");
        remove_submenu_page('options-general.php', "options-reading.php");
        remove_submenu_page('options-general.php', "options-discussion.php");
        remove_submenu_page('options-general.php', "options-media.php");
        remove_submenu_page('options-general.php', "options-permalink.php");
        remove_submenu_page('edit.php', "edit-tags.php?taxonomy=post_tag");
    }
}
add_action('admin_menu', 'options_general_for_editors', 999);



/**
 * Get all taxonomies related to posts and custom posts
 *
 * @return array
 */
function getTaxonomies() {
	global $wpdb;
	$taxs = $wpdb->get_col( "SELECT DISTINCT taxonomy FROM $wpdb->term_taxonomy" );
	$taxs_flip[false] = 'none';

	foreach ($taxs as $key => $tax) {
		if( $tax === 'translation_priority' || $tax === 'nav_menu' ) {
			unset( $taxs[ $key ] ); 
		} else {
			$taxs_flip[$tax] = $tax; // set key as value
		}
	}

	return $taxs_flip;
}



/**
 * Get all posts types (custom posts included)
 *
 * @return array
 */
function getPostTypes() {
	global $wpdb;
	$post_types = $wpdb->get_col( "SELECT DISTINCT post_type FROM $wpdb->posts" );
	$posts = [];

	foreach ($post_types as $key => $post_type) {
		if( $post_type === 'revision' || $post_type === 'customize_changeset' || $post_type === 'nav_menu_item' ) {
			unset( $post_types[ $key ] ); 
		} else {
			$posts[$post_type] = $post_type; // set key as value
		}
	}

	return $posts;
} 



function getTermsByTax( $taxonomy, $parent = false ) {

	$args = array(
    	'taxonomy' => $taxonomy,
    	'hide_empty' => true,
	);

	if( $parent ) {
		$args['parent'] = 0;
	}

	$terms = get_terms( $args );

	return $terms;

}