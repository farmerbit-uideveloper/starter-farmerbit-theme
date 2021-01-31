<?php

namespace Flynt\Components\GridPostsArchive;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Term;
use Timber\Timber;

const POST_TYPE = 'post';
const FILTER_BY_TAXONOMY = 'category';

add_filter('Flynt/addComponentData?name=GridPostsArchive', function ($data) {
    $postType = POST_TYPE;
    $taxonomy = FILTER_BY_TAXONOMY;
    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => true,
    ]);
    $queriedObject = get_queried_object();
    if (count($terms) > 1) {
        $data['terms'] = array_map(function ($term) use ($queriedObject) {
            $timberTerm = new Term($term);
            if ($queriedObject) {
                $timberTerm->isActive = $queriedObject->taxonomy === $term->taxonomy && $queriedObject->term_id === $term->term_id;
            }
            return $timberTerm;
        }, $terms);
        // Add item for all posts
        array_unshift($data['terms'], [
            'link' => get_post_type_archive_link($postType),
            'title' => $data['labels']['allPosts'],
            'isActive' => is_home() || is_post_type_archive($postType),
        ]);
    }

    $data['title'] =  Options::getTranslatable('GridPostsArchive', 'titolo');
    $data['text'] = Options::getTranslatable('GridPostsArchive', 'preContentHtml');

    $args = array(
        'type' => 'monthly',
        'format' => 'custom',
        'before' => '',
        'after' => '|',
        'echo' => false,
        'order' => 'ASC'
    );

    $archivio = wp_get_archives( $args );

    if (!empty($archivio) ) {
        $archivio_arr = explode('|', $archivio);
        $archivio_arr = array_filter($archivio_arr, function($item) {
            return trim($item) !== '';
        }); // Remove empty whitespace item from array
     
        foreach($archivio_arr as $archivio_item) {
            $archivio_row = trim($archivio_item);
            preg_match('/href=["\']?([^"\'>]+)["\']>(.+)<\/a>/', $archivio_row, $archivio_vars);
        
            if (!empty($archivio_vars)) {
                $data['archivio'][] = array(
                    'name' => $archivio_vars[2], // Ex: January 2020
                    'value' => $archivio_vars[1] // Ex: http://demo.com/2020/01/
                );
            }
        }
    }


    return $data;
});

Options::addGlobal('GridPostsArchive', [
    [
        'label' => 'Load More Button?',
        'name' => 'loadMore',
        'type' => 'true_false',
        'default_value' => 0,
        'ui' => true
    ],  
]);


Options::addTranslatable('GridPostsArchive', [
    [
        'label' => 'General',
        'name' => 'general',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => true,
    ],
    [
        'label' => '',
        'name' => 'options',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
            FieldVariables\getTheme()
        ]
    ],
    [
        'label' => 'Titolo',
        'name' => 'titolo',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'wrapper' => 
        [
          'width' => '',
          'class' => '',
          'id' => '',
        ],
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
    ],
    [
        'label' => 'Pre-Content',
        'name' => 'preContentHtml',
        'type' => 'wysiwyg',
        'instructions' => 'Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.',
        'tabs' => 'visual,text',
        'media_upload' => 0,
        'delay' => 1,
        'wrapper' => [
            'class' => 'autosize',
        ],
    ],
    [
        'label' => 'Labels',
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => false
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => 'Previous Label',
                'name' => 'previous',
                'type' => 'text',
                'default_value' => 'Prev',
                'required' => 1,
            ],
            [
                'label' => 'Next Label',
                'name' => 'next',
                'type' => 'text',
                'default_value' => 'Next',
                'required' => 1,
            ],
            [
                'label' => 'Load More Label',
                'name' => 'loadMore',
                'type' => 'text',
                'default_value' => 'Load more',
                'required' => 1,
            ],
            [
                'label' => 'No Posts Found Text',
                'name' => 'noPostsFound',
                'type' => 'text',
                'default_value' => 'No posts found.',
                'required' => 1,
            ],
            [
                'label' => 'All Posts Label',
                'name' => 'allPosts',
                'type' => 'text',
                'default_value' => 'All',
                'required' => 1,
            ],
            [
                'label' => 'Read More Label',
                'name' => 'readMore',
                'type' => 'text',
                'default_value' => 'Read More',
                'required' => 1,
            ]
        ],
    ],
]);
