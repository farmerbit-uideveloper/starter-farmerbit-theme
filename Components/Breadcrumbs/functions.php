<?php

namespace Flynt\Components\Breadcrumbs;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=Breadcrumbs', function ($data) {


	$breadcrumbs_echo = '';

	/* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page
	$text['page']     = 'Page %s'; // text 'Page N'
	$text['cpage']    = 'Comment Page %s'; // text 'Comment Page N'

	$wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // the opening wrapper tag
	$wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
	$sep            = '<span class="breadcrumbs__separator"> '. Options::getGlobal('Breadcrumbs', 'separator') .' </span>'; // separator between crumbs
	$before         = '<span class="breadcrumbs__current">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb

	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_current   = 1; // 1 - show current page title, 0 - don't show
	$show_last_sep  = 1; // 1 - show last separator, when current page title is not displayed, 0 - don't show
	/* === END OF OPTIONS === */

	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_front_page() ) {

		if ( $show_on_home ) $breadcrumbs_echo .= $wrap_before . $home_link . $wrap_after;

	} else {

		$position = 0;

		$breadcrumbs_echo .= $wrap_before;

		if ( $show_home_link ) {
			$position += 1;
			$breadcrumbs_echo .= $home_link;
		}

		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) $breadcrumbs_echo .= $sep;
				$breadcrumbs_echo .= sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				$breadcrumbs_echo .= $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				$breadcrumbs_echo .= $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) $breadcrumbs_echo .= $sep;
					$breadcrumbs_echo .= $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;
			}

		} elseif ( is_tax() ) {
			
			$qo = get_queried_object();
			$position += 1;
			$breadcrumbs_echo .= $sep . sprintf( $link, get_term_link( $qo->term_id ), $qo->name, $position );

		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) $breadcrumbs_echo .= $sep;
				$breadcrumbs_echo .= sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				$breadcrumbs_echo .= $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) $breadcrumbs_echo .= $sep;
					$breadcrumbs_echo .= $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;
			}

		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) $breadcrumbs_echo .= $sep;
			if ( $show_current ) $breadcrumbs_echo .= $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) $breadcrumbs_echo .= $sep;

		} elseif ( is_month() ) {
			if ( $show_home_link ) $breadcrumbs_echo .= $sep;
			$position += 1;
			$breadcrumbs_echo .= sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) $breadcrumbs_echo .= $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;

		} elseif ( is_day() ) {
			if ( $show_home_link ) $breadcrumbs_echo .= $sep;
			$position += 1;
			$breadcrumbs_echo .= sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			$breadcrumbs_echo .= sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) $breadcrumbs_echo .= $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;

		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() == 'post' ) {
				/*$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) $breadcrumbs_echo .= $sep;
					$breadcrumbs_echo .= sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}*/
				$position += 1;
				$breadcrumbs_echo .= $sep;
				$page_blog = get_option( 'page_for_posts' );
				$breadcrumbs_echo .= sprintf( $link, get_permalink($page_blog), get_the_title($page_blog), $position );
				// $category = get_the_category();
				// if(!empty($category)) {
				//     $position += 1;
				//     $breadcrumbs_echo .= $sep;
				//     $breadcrumbs_echo .= sprintf( $link, get_category_link($category[0]->term_id), $category[0]->name, $position );
				// }

				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					$breadcrumbs_echo .= $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					$breadcrumbs_echo .= $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					//if ( $show_current ) $breadcrumbs_echo .= $sep . $before . get_the_title() . $after;
					//elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;
				}
			} elseif ( get_post_type() == 'uideveloper_creation' ) {+
				$position += 1;
				$breadcrumbs_echo .= $sep;
				$creations_archive = Options::getGlobal('Acf', 'creationsPage');
				$breadcrumbs_echo .= sprintf( $link, $creations_archive['url'], $creations_archive['title'], $position );                
			}

		} elseif ( is_post_type_archive() || is_home() ) {
			$post_type = get_post_type_object( get_post_type() );
			$archive_label = is_home() ? single_post_title( '', false ) : $post_type->label; // FC

			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) $breadcrumbs_echo .= $sep;
				$breadcrumbs_echo .= sprintf( $link, get_post_type_archive_link( $post_type->name ), $archive_label, $position );
				$breadcrumbs_echo .= $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) $breadcrumbs_echo .= $sep;
				if ( $show_current ) $breadcrumbs_echo .= $before . $archive_label . $after;
				elseif ( $show_home_link && $show_last_sep ) $breadcrumbs_echo .= $sep;
			}

		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) $breadcrumbs_echo .= $sep;
				$breadcrumbs_echo .= sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			$breadcrumbs_echo .= $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) $breadcrumbs_echo .= $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;

		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) $breadcrumbs_echo .= $sep;
			if ( $show_current ) $breadcrumbs_echo .= $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) $breadcrumbs_echo .= $sep;

		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) $breadcrumbs_echo .= $sep;
				$breadcrumbs_echo .= sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) $breadcrumbs_echo .= $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;

		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				$breadcrumbs_echo .= $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				$breadcrumbs_echo .= $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) $breadcrumbs_echo .= $sep;
				if ( $show_current ) $breadcrumbs_echo .= $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) $breadcrumbs_echo .= $sep;
			}

		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$breadcrumbs_echo .= $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				$breadcrumbs_echo .= $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) $breadcrumbs_echo .= $sep;
				if ( $show_current ) $breadcrumbs_echo .= $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) $breadcrumbs_echo .= $sep;
			}

		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) $breadcrumbs_echo .= $sep;
			if ( $show_current ) $breadcrumbs_echo .= $before . $text['404'] . $after;
			elseif ( $show_last_sep ) $breadcrumbs_echo .= $sep;

		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) $breadcrumbs_echo .= $sep;
			$breadcrumbs_echo .= get_post_format_string( get_post_format() );
		}

		$breadcrumbs_echo .= $wrap_after;

	}

	$data['breadcrumbs'] = $breadcrumbs_echo;

    return $data;
});


/**
 * Layout for Flynt ACF Flexible Content
 *
 * @return void
 */
function getACFLayout() {
    return [
		'label' => 'Breadcrumbs',
		'name' => 'breadcrumbs',
        'sub_fields' => getSubFields()
    ];
}


/**
 * Sub Component inside a Standard Component
 *
 * @param boolean $suffix
 * @return void
 */
function getSubComponent( $suffix = false, $options = true )
{  
	$suffix = $suffix ? '_' . $suffix : '';

  	return [
		'label' => 'Breadcrumbs (sub)',
		'name' => 'subCompBreadcrumbs' . $suffix,
		'type' => 'group',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '',
			'class' => '',
			'id' => '',
		],
		'layout' => 'block',
		'sub_fields' => getSubFields( $options )
  	];  

}

/**
 * Sharing subfields between Sub Component and ACF Layout
 *
 * @param boolean $options : false hide options tab & fields
 * @return void
 */
function getSubFields( $options = true ) {

	return [
		$options ? [
			'label' => 'General',
			'name' => 'generalTab',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0,
		] : [],
		[
			'label' => 'Messaggio',
			'name' => 'info',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'wrapper' => 
			[
			  'width' => '',
			  'class' => '',
			  'id' => '',
			],
			'message' => 'Nessuna impostazione disponibile per questo blocco.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		],
		$options ? [
			'label' => 'Options',
			'name' => 'optionsTab',
			'type' => 'tab',
			'placement' => 'top',
			'endpoint' => 0
		] : [],
		$options ? [
			'label' => '',
			'name' => 'options',
			'type' => 'group',
			'layout' => 'row',
			'sub_fields' => [
				FieldVariables\getSectionId(),
				FieldVariables\getSectionClasses(),
				FieldVariables\getContainer(),
				FieldVariables\getRow(),
				FieldVariables\getColsClasses(),
				FieldVariables\getItemClasses(),
			]
		] : [],
	];
}


Options::addGlobal('Breadcrumbs', [
    [
        'name' => 'options',
        'label' => 'Opzioni',
        'type' => 'tab'
    ],
    [
        'label' => 'Separatore',
        'name' => 'separator',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '|',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ]
]);