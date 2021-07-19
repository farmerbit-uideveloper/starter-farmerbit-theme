<?php

namespace Flynt\Components\Popup;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Flynt\Components;
use Timber;

add_filter('Flynt/addComponentData?name=Popup', function ($data) {

	if( $data['type'] == 'search' ) {
		$data['searchLabels' ] = Options::getTranslatable( 'ListSearchResults', 'labels' );
	}

    return $data;
});