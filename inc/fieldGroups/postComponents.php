<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

// add_action('Flynt/afterRegisterComponents', function () {
//     ACFComposer::registerFieldGroup([
//         'name' => 'postComponents',
//         'title' => 'Post Components',
//         'style' => 'seamless',
//         'fields' => [
//             [
//                 'name' => 'postComponents',
//                 'label' => __('Post Components', 'uideveloper'),
//                 'type' => 'flexible_content',
//                 'button_label' => __('Add Component', 'uideveloper'),
//                 'layouts' => [
//                     Components\BlockCollapse\getACFLayout(),
//                     Components\BlockImage\getACFLayout(),
//                     Components\BlockImageText\getACFLayout(),
//                     Components\BlockVideoOembed\getACFLayout(),
//                     Components\BlockWysiwyg\getACFLayout(),
//                     Components\SliderImages\getACFLayout(),
//                 ],
//             ],
//         ],
//         'location' => [
//             [
//                 [
//                     'param' => 'post_type',
//                     'operator' => '==',
//                     'value' => 'post',
//                 ],
//             ],
//         ],
//     ]);
// });
