<?php

use Timber\Timber;
use Timber\Post;
use Flynt\Utils\Options;

$context = Timber::get_context();
$context['post'] = new Post();
$context['is_home'] = is_home();

$menuPrincipale = get_option( 'options_translatable_MenuPrincipale_composerMenu' );

$context['menuHasSearch'] = in_array( 'search', $menuPrincipale ) ? true : false;

Timber::render('templates/home.twig', $context);