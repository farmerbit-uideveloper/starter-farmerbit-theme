<?php

use Timber\Timber;
use Timber\Post;
use Flynt\Utils\Options;

$context = Timber::get_context();
$context['post'] = new Post();

$menuPrincipale = get_option( 'options_translatable_MenuPrincipale_composerMenu' );

$context['menuHasSearch'] = in_array( 'search', $menuPrincipale ) ? true : false;
$context['searchPlaceholder'] = Options::getTranslatable( 'ListSearchResults', 'searchPlaceholder' );

Timber::render('templates/page.twig', $context);
