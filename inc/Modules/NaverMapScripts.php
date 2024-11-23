<?php

namespace SWM\MapNoteWP\Modules;

use Bojaghi\Contract\Module;

class NaverMapScripts implements Module
{
    public function __construct()
    {
        wp_register_script(
            handle: 'swc-naver-map',
            src: add_query_arg(
                'ncpClientId',
                '', // TODO: change this.
                'https://oapi.map.naver.com/openapi/v3/maps.js',
            ),
            ver: null,
            args: [
                'in_footer' => true,
                'strategy'  => 'async',
            ],
        );
    }

    public function enqueueNaverMap(): void
    {
        if (!wp_script_is('swc-naver-map')) {
            wp_enqueue_script('swc-naver-map');
        }
    }
}
