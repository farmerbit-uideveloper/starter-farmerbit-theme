<?php

namespace Flynt\Components\Form;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=Form', function ($data) {

  $data['_fc_token'] = wp_create_nonce( 'fc-form-request' );
  $data['page_from'] = wp_strip_all_tags( get_the_title() );
  $data['page_url'] = get_permalink();

  $unique_id = generateRandomString(4);

  $data['formId'] 	= $unique_id;
  $data['sectionId'] 	= $unique_id;  
  $data['ajaxurl'] = admin_url( 'admin-ajax.php' );

  return $data;

});

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function getACFLayout()
{

  // opzioni dei campi del form

  $name = [
    'label' => 'Name',
    'name' => 'name',
    'type' => 'text',
    'instructions' => 'Non utilizzare spazio o lettere maiuscole.',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
  ];

  $placeholder = [
    'label' => 'Placeholder',
    'name' => 'placeholder',
    'type' => 'text',
    'instructions' => '',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
  ];

  $width = [
    'label' => 'Width',
    'name' => 'width',
    'type' => 'text',
    'instructions' => 'Utilizzare le classi di bootstrap',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => 'col-lg-12',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
  ];

  $text = [
    'label' => 'Testo',
    'name' => 'text',
    'type' => 'text',
    'instructions' => '',
    'required' => 0,
    'wrapper' => [
        'width' => '',
        'class' => '',
        'id' => '',
    ],
    'default_value' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
    'maxlength' => '',
  ];

  $required = [
    'label' => 'Campo Obbligatorio',
    'name' => 'required',
    'type' => 'true_false',
    'instructions' => '',
    'required' => 0,
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
  ];

  $icon = [
    'label' => 'Icona',
    'name' => 'icon',
    'type' => 'image',
    'instructions' => '',
    'required' => 0,
    'wrapper' => 
    [
      'width' => '',
      'class' => '',
      'id' => '',
    ],
    'return_format' => 'array',
    'preview_size' => 'medium',
    'library' => 'all',
    'min_width' => '',
    'min_height' => '',
    'min_size' => '',
    'max_width' => '',
    'max_height' => '',
    'max_size' => '',
    'mime_types' => '',
  ];


    return [
        'name' => 'Form',
        'label' => 'Form',
        'sub_fields' => [
            [
                'label' => 'Block 1',
                'name' => 'generalTab1',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Block Type',
                'name' => 'blockType1',
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
                        'text' => 'text',
                        'image' => 'image',
                    ],
                'default_value' => 
                    [
                        0 => 'text',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Title Alignment',
                'name' => 'titleAlignment1',
                'type' => 'button_group',
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "text"
                        ]
                    ]
                ],
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
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "text"
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
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "text"
                        ]
                    ]
                ],
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
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "text"
                        ]
                    ]
                ],
                'wrapper' => [
                    'class' => 'autosize ui-taller-100',
                ],
            ],
            [
                'label' => 'Image',
                'name' => 'blockImage1',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                'wrapper' => 
                [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ],
            [
                'label' => 'Image Fit',
                'name' => 'imageFit1',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                'wrapper' => 
                    [
                        'width' => '',
                        'class' => 'ui-table-cell',
                        'id' => '',
                    ],
                'choices' => 
                    [
                        'cover' => 'cover',
                        'contain' => 'contain',
                    ],
                'default_value' => 
                    [
                        0 => 'cover',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ],
            [
                'label' => 'Streched?',
                'name' => 'imageStreched1',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' =>
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                'wrapper' => 
                [
                    'width' => '',
                    'class' => 'ui-table-cell',
                    'id' => '',
                ],
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ],
            [
              'label' => 'Link (CTA)',
              'name' => 'ctaUrl1',
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
                'label' => 'CTA label',
                'name' => 'ctaLabel1',
                'type' => 'text',
                'instructions' => '',
                'conditional_logic' => 
                [
                    [
                        [
                            "fieldPath" => "blockType1",
                            "operator" => "==",
                            "value" => "text"
                        ]
                    ]
                ],              
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
              'label' => 'Form',
              'name' => 'generalTab4',
              'type' => 'tab',
              'placement' => 'top',
              'endpoint' => 0
            ],
            [
              'label' => 'Email destinatario',
              'name' => 'to',
              'type' => 'text',
              'instructions' => 'Lasciare vuota per inviare la mail alla mail impostata sulle impostazioni',
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
              'label' => 'Oggetto email',
              'name' => 'object',
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
              'label' => 'Width Form',
              'name' => 'formWidth',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'default_value' => 'col-lg-12',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ],
            [
              'label' => 'Header From',
              'name' => 'headerFrom',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'default_value' => 'From: nome sito <noreply@dominio.sito>',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ],
            [
              'label' => 'Header ReplyTo',
              'name' => 'headerReplyTo',
              'type' => 'text',
              'instructions' => '',
              'required' => 0,
              'wrapper' => 
              [
                'width' => '',
                'class' => '',
                'id' => '',
              ],
              'default_value' => 'Reply-To: [nome] <[email]>',
              'placeholder' => '',
              'prepend' => '',
              'append' => '',
              'maxlength' => '',
            ],
            [
              'label' => 'Campi del form',
              'name' => 'campiForm',
              'type' => 'flexible_content',
              'instructions' => '',
              'required' => 1,
              'wrapper' => [
                  'width' => '',
                  'class' => '',
                  'id' => '',
              ],
              'layouts' => [
                'text' => [
                    'name' => 'text',
                    'label' => 'Text',
                    'display' => 'block',
                    'sub_fields' => [
                        $name,
                        $placeholder,
                        $width,
                        $required
                      ],
                    'min' => '',
                    'max' => '',
                ],
                'email' => [
                  'name' => 'email',
                  'label' => 'Email',
                  'display' => 'block',
                  'sub_fields' => [
                      $name,
                      $placeholder,
                      $width,
                      $required
                    ],
                  'min' => '',
                  'max' => '',
                ],
                'file' => [
                  'name' => 'file',
                  'label' => 'File',
                  'display' => 'block',
                  'sub_fields' => [
                      $name,
                      $placeholder,
                      $width,
                      $required,
                      $icon
                    ],
                  'min' => '',
                  'max' => '',
                ],
                'textarea' => [
                  'name' => 'textarea',
                  'label' => 'Area di testo',
                  'display' => 'block',
                  'sub_fields' => [
                      $name,
                      $placeholder,
                      $width,
                      $required
                    ],
                  'min' => '',
                  'max' => '',
                ],
                'checkbox' => [
                  'name' => 'checkbox',
                  'label' => 'Checkbox',
                  'display' => 'block',
                  'sub_fields' => [
                      $name,
                      $text,
                      $width,
                      $required
                    ],
                  'min' => '',
                  'max' => '',
                ],
                'data' => [
                  'name' => 'data',
                  'label' => 'Data',
                  'display' => 'block',
                  'sub_fields' => [
                      $name,
                      $placeholder,
                      $width,
                      $required
                    ],
                  'min' => '',
                  'max' => '',
                ],
                'ora' => [
                  'name' => 'ora',
                  'label' => 'Ora',
                  'display' => 'block',
                  'sub_fields' => [
                      $name,
                      $placeholder,
                      $width,
                    ],
                  'min' => '',
                  'max' => '',
                ],
                'button' => [
                  'name' => 'button',
                  'label' => 'Pulsante di invio',
                  'display' => 'block',
                  'sub_fields' => [
                    $text,
                    $width,
                  ],
                  'min' => '',
                  'max' => '',
                ],
              ],
              'button_label' => 'Aggiungi Campo',
              'min' => '',
              'max' => '',
            ],
            [
              'label' => 'Contenuto Mail',
              'name' => 'content_mail',
              'type' => 'textarea',
              'instructions' => 'Inserire il contenuto della mail che arriverà all\'amministratore del sito oppure alla mail in alto, se inserita.<br>
              Richiamare i campi con le parentesi quadre []<br>
              Ad esempio, se ho creato un campo che ha come nome "telefono", lo posso richiamare con la stringa "[telefono]"',
              'required' => 1,
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
              'label' => 'Inserire i campi da allegare alla mail come file',
              'name' => 'attachment',
              'type' => 'textarea',
              'instructions' => 'Esempio se il campo si chiama file-pdf: [file-pdf]',
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
              'new_lines' => '',
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
                  FieldVariables\getSectionClasses(),
                  FieldVariables\getColsClasses1(),
                  [
                    'label' => 'Theme',
                    'name' => 'theme',
                    'type' => 'select',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'choices' => [
                        '' => '(none)',
                        'bg-grey' => 'Background Grey', 
                    ]
                  ]
                ]
            ],
        ]
    ];
}

add_filter('acf/fields/flexible_content/layout_title', function($title) {
  $new_title = $title;
  if ($name_field = get_sub_field('name')) {
    $new_title = sprintf($title . ': ' . '<strong>' . $name_field . '</strong>');
  }
  return $new_title;
});

function form_send_component_callback() {

  // Campi del form
  
  $email_subject = $_POST['_object_mail'];
  $to = $_POST['_to_mail'];
  
  $_fc_token  	      = $_POST['_fc_token'];
  $_fc_from_page 	    = $_POST['_fc_page_from'];
  $_fc_from_page_url 	= $_POST['_fc_page_from_url'];
  $_form_id           = $_POST['_form_id'];
  $_headerReplyTo     = $_POST['_headerReplyTo'];
  $_headerFrom        = $_POST['_headerFrom'];
  $_attachment        = $_POST['_attachment'];
  
  $errors = array(); // Array di messaggi di errore
  $output = 'debug'; // Stringa HTML di output
  
  // Validazione
  if( empty( $_fc_token ) || wp_verify_nonce( $_fc_token, 'fc-form-request' ) === false ) {
      $errors[] = __( 'C\'è stato un errrero. Ci scusiamo per il disagio. Ti preghiamo di riprovare più tardi.', 'aragonese' );
  }
  
  if( count( $errors ) > 0 ) { // Ci sono errori
  
      $output = '<div id="validation-output">';
      foreach( $errors as $error ) {
        $output .= '<div class="message error">' . $error . '</div>';
      }
      $output .= '</div>';
  
  } else { // Invio e-mail
  
  if(empty($email_subject)) {
    $email_subject = 'Richiesta di contatto';
  }

  // formatting content mail
  
  $email_content = $_POST['_content_mail']; 
  preg_match_all('/\[(.*?)\]/', $email_content, $matches);
  
  foreach ($matches[1] as $key=>$field) {
      $input_name = $field . '-' . $_form_id;
      $value = $_POST[$input_name];
      $email_content = str_replace($matches[0][$key], $value, $email_content);
  }
  
  $email_content .= '<br><br>----------<br>Messaggio inviato dalla pagina <a href="'.$_fc_from_page_url.'">'.$_fc_from_page.'</a>';

  /* end */

  // formatting headers

  preg_match_all('/\[(.*?)\]/', $_headerFrom, $matches);
  
  foreach ($matches[1] as $key=>$field) {
    $input_name = $field . '-' . $_form_id;
    $value = $_POST[$input_name];
    $_headerFrom = str_replace($matches[0][$key], $value, $_headerFrom);
  }

  preg_match_all('/\[(.*?)\]/', $_headerReplyTo, $matches);
  
  foreach ($matches[1] as $key=>$field) {
    $input_name = $field . '-' . $_form_id;
    $value = $_POST[$input_name];
    $_headerReplyTo = str_replace($matches[0][$key], $value, $_headerReplyTo);
  }

  preg_match_all('/\[(.*?)\]/', $_attachment, $matches);
  
  foreach ($matches[1] as $key=>$field) {
    $input_name = $field . '-' . $_form_id;
    $id_media = $_POST[$input_name];
    $url_attachment = wp_get_attachment_url( $id_media );
    $attachment[] = $url_attachment;
  }

  /* end */
  
  if( empty($to) ) {
    $to = get_bloginfo( 'admin_email' );
  }
  
  $body 		= $email_content;

  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  $headers[] = $_headerReplyTo;
  $headers[] = $_headerFrom;

  wp_mail( $to, $email_subject, $body, $headers, $attachment );
  
  $output  = '<div class="clear"></div><div id="validation-output">';
  $output .= '<div class="message success">' . __( 'Messaggio inviato con successo', 'sarbo' ) . '</div>';
  $output .= '</div>';
  
  }
  
  echo $output; // Restituisco la stringa HTML
  
  wp_die(); 
}

add_action( 'wp_ajax_form_send_component', 'Flynt\\Components\\Form\\form_send_component_callback' ); // Utenti loggati
add_action( 'wp_ajax_nopriv_form_send_component', 'Flynt\\Components\\Form\\form_send_component_callback' ); // Tutti i visitatori


function form_file_upload_callback() {
  $wordpress_upload_dir = wp_upload_dir();
  $i = 1;

  $file = $_FILES['file'];
  $new_file_path = $wordpress_upload_dir['path'] . '/' . $file['name'];
  $new_file_mime = mime_content_type( $file['tmp_name'] );
  
  if( empty( $file ) )
    die( 'File is not selected.' );
  
  if( $file['error'] )
    die( $file['error'] );
  
  if( $file['size'] > wp_max_upload_size() )
    die( 'It is too large than expected.' );
  
  if( !in_array( $new_file_mime, get_allowed_mime_types() ) )
    die( 'WordPress doesn\'t allow this type of uploads.' );
  
  while( file_exists( $new_file_path ) ) {
    $i++;
    $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $file['name'];
  }
  
  // looks like everything is OK
  if( move_uploaded_file( $file['tmp_name'], $new_file_path ) ) {  
  
    $upload_id = wp_insert_attachment( array(
      'guid'           => $new_file_path, 
      'post_mime_type' => $new_file_mime,
      'post_title'     => preg_replace( '/\.[^.]+$/', '', $file['name'] ),
      'post_content'   => '',
      'post_status'    => 'inherit'
    ), $new_file_path );
  
    // wp_generate_attachment_metadata() won't work if you do not include this file
    // require_once( ABSPATH . 'wp-admin/includes/image.php' );
  
    // Generate and save the attachment metas into the database
    wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
  
    // Show the uploaded file in browser
    // echo $wordpress_upload_dir['url'] . '/' . basename( $new_file_path );

    echo substr($upload_id, 0, -1);
  
  }
}

add_action( 'wp_ajax_form_upload_file', 'Flynt\\Components\\Form\\form_file_upload_callback' ); // Utenti loggati
add_action( 'wp_ajax_nopriv_form_upload_file', 'Flynt\\Components\\Form\\form_file_upload_callback' ); // Tutti i visitatori