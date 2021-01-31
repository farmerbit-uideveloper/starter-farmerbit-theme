<?php

use Timber\Timber;
use Timber\Post;
use Flynt\Utils\Options;

$context = Timber::get_context();
$context['post'] = new Post();
$context['fixedCtaTitle'] = Options::getTranslatable('BannerAComparsa', 'fixedCtaTitle');
$context['textButton'] = Options::getTranslatable('BannerAComparsa', 'textButton');
$context['titleForm'] = Options::getTranslatable('BannerAComparsa', 'titleForm');

$dataForm['_fc_token'] = wp_create_nonce( 'fc-form-request' );
$dataForm['page_from'] = wp_strip_all_tags( get_the_title() );
$dataForm['page_url'] = get_permalink();

$unique_id = generateRandomStringCTA(4);

$dataForm['formId'] 	= $unique_id;
$dataForm['sectionId'] 	= $unique_id;  
$dataForm['ajaxurl'] = admin_url( 'admin-ajax.php' );

$dataForm['campiForm'] = Options::getTranslatable('BannerAComparsa', 'campiForm');
$dataForm['content_mail'] = Options::getTranslatable('BannerAComparsa', 'content_mail');
$dataForm['cta_link'] = Options::getTranslatable('BannerAComparsa', 'cta_link');
$dataForm['cta_title'] = Options::getTranslatable('BannerAComparsa', 'cta_title');
$dataForm['cta_type'] = Options::getTranslatable('BannerAComparsa', 'cta_type');
$dataForm['description'] = Options::getTranslatable('BannerAComparsa', 'description');
$dataForm['descriptionForm'] = Options::getTranslatable('BannerAComparsa', 'descriptionForm');
$dataForm['headerFrom'] = Options::getTranslatable('BannerAComparsa', 'headerFrom');
$dataForm['headerReplyTo'] = Options::getTranslatable('BannerAComparsa', 'headerReplyTo');
$dataForm['object'] = Options::getTranslatable('BannerAComparsa', 'object');
$dataForm['to'] = Options::getTranslatable('BannerAComparsa', 'to');

$context['dataForm'] = $dataForm;


function generateRandomStringCTA($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

include 'inc/lang.php';

Timber::render('templates/page.twig', $context);
