<?php

namespace Flynt\Components\GridPostList;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Term;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=GridPostList', function ($data) {

    if($data['post_type'] == 'post' && $data['enable_filters'] == '1' ) {
        $postType = $data['post_type'];
        $taxonomy = 'category';
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ]);
        $queriedObject = get_queried_object();
        if (count($terms) > 0) {
            $data['terms'] = array_map(function ($term) use ($queriedObject) {
                $timberTerm = new Term($term);
                if ($queriedObject) {
                    $timberTerm->isActive = $queriedObject->taxonomy === $term->taxonomy && $queriedObject->term_id === $term->term_id;
                }
                return $timberTerm;
            }, $terms);
            // Add item for all posts
            $blogPage = Options::getTranslatable('ImpostazioniSito', 'pageBlog');
            array_unshift($data['terms'], [
                'link' => get_permalink($blogPage->ID),
                'title' => __('Tutte','sarbo'),
                'isActive' => (get_permalink($blogPage->ID) == get_permalink()) ? true : false ,
            ]);
        }

        $args = array(
            'type' => 'monthly',
            'format' => 'custom',
            'before' => '',
            'after' => '|',
            'echo' => false,
            'order' => 'ASC',
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
    }elseif ($data['post_type'] == 'referenza' && $data['enable_filters'] == '1' ) {
        $postType = $data['post_type'];
        $taxonomy = 'categoria-referenza';
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ]);
        $queriedObject = get_queried_object();
        if (count($terms) > 0) {
            $data['terms'] = array_map(function ($term) use ($queriedObject) {
                $timberTerm = new Term($term);
                if ($queriedObject) {
                    $timberTerm->isActive = $queriedObject->taxonomy === $term->taxonomy && $queriedObject->term_id === $term->term_id;
                }
                return $timberTerm;
            }, $terms);
            // Add item for all posts
            $blogPage = Options::getTranslatable('ImpostazioniSito', 'pageBlog');
            array_unshift($data['terms'], [
                'link' => get_permalink($blogPage->ID),
                'title' => __('Tutte','sarbo'),
                'isActive' => (get_permalink($blogPage->ID) == get_permalink()) ? true : false ,
            ]);
        }
    }

    if (empty($data['posts'])) {
        global $paged;
        if (!isset($paged) || !$paged){
            $paged = 1;
        }
    
        $args = array(
            'post_type'              => $data['post_type'],
            'nopaging'               => false,
            'paged'                  => $paged,
            'posts_per_page'         => get_option( 'posts_per_page' ),
        );

        if(isset($_GET['cat']) && !empty($_GET['cat'])) {
            $args['cat'] = $_GET['cat'];
        }

        $data['args'] = $args;
        
        query_posts($args);
    
        $data['posts'] = Timber::get_posts();
        $data['pagination'] = Timber::get_pagination();
        
        wp_reset_query();
    }elseif (empty($data['pagination'])) {
        $data['pagination'] = Timber::get_pagination();
    } 

    return $data;
});


function getACFLayout()
{
    return [
        'name' => 'GridPostList',
        'label' => 'Lista: articoli, servizi',
        'sub_fields' => [
            [
                'label' => 'Block 1',
                'name' => 'generalTab1',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Title Alignment',
                'name' => 'titleAlignment1',
                'type' => 'button_group',
                'choices' => [
                    'text-left' => '
<i class=\'dashicons dashicons-editor-alignleft\' title=\'Align text left\'></i>',
                    'text-center' => '
<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Align text center\'></i>',
                    'text-right' => '
<i class=\'dashicons dashicons-editor-alignright\' title=\'Align text right\'></i>',
                    'text-justify' => '
<i class=\'dashicons dashicons-editor-justify\' title=\'Justify text\'></i>'
				],
				'default_value' => ''
            ],
            [
                'label' => 'Heading tag',
                'name' => 'headingType1',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                'choices' => 
                    [
                        'h1' => 'h1',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'div' => 'div',
                        'span' => 'span',
                    ],
                'default_value' => 
                    [
                        0 => 'h1',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Title',
                'name' => 'titleHtml1',
                'type' => 'textarea',
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
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => 'br',
            ],
            [
                'name' => 'descriptionHtml1',
                'label' => 'Content',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 1,
                'required' => 0,
                'wrapper' => [
                    'class' => 'autosize ui-taller-100',
                ],
            ],
            [
              'label' => 'Url',
              'name' => 'ctaUrl1',
              'type' => 'text',
              'instructions' => 'Insert website url (ex: /about-us)',
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
                'label' => 'CTA label',
                'name' => 'ctaLabel1',
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
                'label' => 'Grid Posts',
                'name' => 'generalTab2',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Seleziona tipologia',
                'name' => 'post_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                [
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ],
                'choices' => 
                [
                  'post' => 'Articoli',
                  'referenza' => 'Referenze',
                ],
                'default_value' => 
                [
                  0 => 'Articoli',
                ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Abilitare filtri',
                'name' => 'enable_filters',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "post_type",
                            "operator" => "==",
                            "value" => "post"
                        ]
                    ]
                ],
                'wrapper' => 
                [
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ],
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ],
            [
                'label' => 'Tipologia di filtri',
                'name' => 'filters_theme',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "enable_filters",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                'wrapper' => 
                [
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ],
                'choices' => 
                [
                  'onlyCat' => 'Solo categorie',
                  'catDate' => 'Categorie e Data'
                ],
                'default_value' => 
                [
                  0 => 'onlyCat',
                ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Elementi da visualizzare per pagina',
                'name' => 'postPerPage',
                'type' => 'range',
                'instructions' => '',
                'required' => 0,
                'wrapper' => 
                [
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ],
                'default_value' => '',
                'min' => '',
                'max' => '',
                'step' => '',
                'prepend' => '',
                'append' => '',
            ],
            [
                'label' => 'LoadMore',
                'name' => 'loadMore',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "post_type",
                            "operator" => "==",
                            "value" => "post"
                        ]
                    ],
                    [
                        [
                            "fieldPath" => "post_type",
                            "operator" => "==",
                            "value" => "servizi"
                        ]
                    ]
                ],
                'wrapper' => 
                [
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ],
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getSectionId(),
                    FieldVariables\getColsClasses1(),
                ]
            ],
        ],
    ];
}