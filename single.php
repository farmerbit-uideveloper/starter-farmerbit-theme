<?php

use Timber\Timber;
use Timber\Post;

$context = Timber::get_context();
$context['post'] = new Post();

$menuPrincipale = get_option( 'options_translatable_MenuPrincipale_composerMenu' );

$context['menuHasSearch'] = in_array( 'search', $menuPrincipale ) ? true : false;

Timber::render('templates/single.twig', $context);