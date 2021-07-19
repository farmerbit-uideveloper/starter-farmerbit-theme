<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;
use Flynt\Utils\Options;

use const Flynt\Archives\POST_TYPES;

$context = Timber::get_context();
$context['post'] = new Post();
$context['posts'] = new PostQuery();

if (isset($_GET['contentOnly'])) {
    $context['contentOnly'] = true;
}

$menuPrincipale = get_option( 'options_translatable_MenuPrincipale_composerMenu' );

$context['menuHasSearch'] = in_array( 'search', $menuPrincipale ) ? true : false;

Timber::render('templates/index.twig', $context);
