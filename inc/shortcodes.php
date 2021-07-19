<?php

/**
 * Flynt Shortcodes
 */

namespace Flynt\Shortcodes;

/**
 * Current year
 */
add_shortcode('year', function () {
    $year = date_i18n('Y');
    return $year;
});

/**
 * Site Title
 */
add_shortcode('sitetitle', function () {
    $blogname = get_bloginfo('name');
    return $blogname;
});

/**
 * Tagline
 */
add_shortcode('tagline', function () {
    $tagline = get_bloginfo('description');
    return $tagline;
});

/**
 * Flynt Shortcode reference
 */
function getShortcodeReference()
{
    return [
        'label' => __('Shortcode Reference', 'abitha'),
        'name' => 'groupShortcodes',
        'instructions' => __('A Shortcode can generally be used inside text fields. It’s best practice to switch to text mode before inserting a shortcode inside the visual editor.', 'abitha'),
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Site Title (Website Name)', 'abitha'),
                'name' => 'messageShortcodeSiteTitle',
                'type' => 'message',
                'message' => '<code>[sitetitle]</code>',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Tagline (Subtitle)', 'abitha'),
                'name' => 'messageShortcodeTagline',
                'type' => 'message',
                'message' => '<code>[tagline]</code>',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Current Year', 'abitha'),
                'name' => 'messageShortcodeCurrentYear',
                'type' => 'message',
                'message' => '<code>[year]</code>',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
                'wrapper' => [
                    'width' => 50
                ],
            ],
        ]
    ];
}
