<?php

use SWM\MapNoteWP\Modules\Options;
use SWM\MapNoteWP\Supports\Admin\SettingsView;

if (!defined('ABSPATH')) {
    exit;
}

return [
    'map_note_wp' => [
        'type'              => 'object',
        'group'             => SettingsView::OPTION_GROUP,
        'description'       => 'Generic options of Map Note for WP.',
        'sanitize_callback' => [Options::class, 'mapNoteSanitize'],
        'show_in_rest'      => false,
        'default'           => Options::mapNoteDefault(),
        'autoload'          => true,
    ],
];
