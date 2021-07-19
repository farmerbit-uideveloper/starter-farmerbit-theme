<?php

use Flynt\Utils\Options;

Options::addTranslatable('SliderOptions', [
    [
        'label' => __('Accessibility', 'abitha'),
        'name' => 'a11y',
        'type' => 'group',
        'instructions' => __('Text labels for screen readers.', 'abitha'),
        'sub_fields' => [
            [
                'label' => __('Next Slide Button Text', 'abitha'),
                'name' => 'nextSlideMessage',
                'type' => 'text',
                'default_value' => 'Next Slide',
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Previous Slide Button Text', 'abitha'),
                'name' => 'prevSlideMessage',
                'type' => 'text',
                'default_value' => 'Previous Slide',
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('First Slide Text', 'abitha'),
                'name' => 'firstSlideMessage',
                'type' => 'text',
                'instructions' => __('Text for previous button when swiper is on first slide.', 'abitha'),
                'default_value' => 'This is the first slide',
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Last Slide Text', 'abitha'),
                'name' => 'lastSlideMessage',
                'type' => 'text',
                'instructions' => __('Text for previous button when swiper is on last slide.', 'abitha'),
                'default_value' => 'This is the last slide',
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Pagination Bullet Message', 'abitha'),
                'name' => 'paginationBulletMessage',
                'type' => 'text',
                'instructions' => '`{{index}}` will be replaced for the slide number.',
                'default_value' => 'Go to slide {{index}}',
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);
