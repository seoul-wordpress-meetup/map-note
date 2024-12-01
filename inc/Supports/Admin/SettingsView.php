<?php

namespace SWM\MapNoteWP\Supports\Admin;

use SWM\MapNoteWP\Modules\Options;
use SWM\MapNoteWP\Supports\View;

class SettingsView implements View
{
    public const OPTION_GROUP = 'map_note_wp';
    public const PAGE_SLUG    = 'map-note-settings';

    public function __construct(
        private Options $options,
    )
    {
    }

    public function display(): void
    {
        $this->prepareSettings();

        $output = mapNoteTmpl(
            'admin/settings',
            [
                'option_group' => self::OPTION_GROUP,
                'page_slug'    => self::PAGE_SLUG,
            ],
        );

        echo wp_kses($output, wp_kses_allowed_html('admin/settings'));
    }

    private function prepareSettings(): void
    {
        $mapNote = $this->options->map_note_wp;
        $value   = $mapNote->get();

        $section = self::PAGE_SLUG . '-generic';

        add_settings_section(
            id: $section,
            title: __('Generic', 'map-note-wp'),
            callback: '__return_empty_string',
            page: self::PAGE_SLUG,
        );

        add_settings_field(
            id: "$section-client_id",
            title: __('Client ID', 'map-note-wp'),
            callback: function ($args) {
                printf(
                    '<input id="%s" class="text regular-text" name="%s" type="%s" value="%s" /><p class="description">%s</p>',
                    'client_id',
                    'map_note_wp[client_id]',
                    'text',
                    $args['value'],
                    __('Client ID', 'map-note-wp'),
                );
            },
            page: self::PAGE_SLUG,
            section: $section,
            args: [
                'label_for' => 'client_id',
                'value'     => $value['client_id'] ?? '',
            ],
        );

        add_settings_field(
            id: "$section-map_page",
            title: __('Target Page', 'map-note-wp'),
            callback: function ($args) {
                wp_dropdown_pages(
                    [
                        'selected'         => $args['value'],
                        'name'             => 'map_note_wp[map_page]',
                        'id'               => 'map_page',
                        'show_option_none' => __('No page', 'map-note-wp'),
                    ],
                );
                echo '<p class="description">' .
                    esc_html__('', 'map-note-wp') .
                    '</p>';
            },
            page: self::PAGE_SLUG,
            section: $section,
            args: [
                'label_for' => 'map_page',
                'value'     => $value['map_page'] ?? 0,
            ],
        );
    }
}
