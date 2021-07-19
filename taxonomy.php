<?php

use Timber\Timber;
use Timber\Term;
use Flynt\Utils\Options;

$context = Timber::get_context();
$context['term'] = new Term();

$menuPrincipale = get_option( 'options_translatable_MenuPrincipale_composerMenu' );

$context['menuHasSearch'] = in_array( 'search', $menuPrincipale ) ? true : false;

Timber::render('templates/term.twig', $context);