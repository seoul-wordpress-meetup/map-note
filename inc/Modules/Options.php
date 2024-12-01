<?php

namespace SWM\MapNoteWP\Modules;

use Bojaghi\Fields\Modules\Options as BaseOptions;
use Bojaghi\Fields\Option\Option;

/**
 * @property-read Option $map_note_wp
 */
class Options extends BaseOptions
{
    public static function mapNoteSanitize(mixed $value): array
    {
        $default = self::mapNoteDefault();
        $output  = $default;

        $output['client_id'] = sanitize_text_field($value['client_id'] ?? $default['client_id']);
        $output['map_page']  = absint($value['map_page'] ?? $default['map_page']);

        return $output;
    }

    public static function mapNoteDefault(): array
    {
        return [
            'client_id' => '',
            'map_page'  => 0,
        ];
    }
}
