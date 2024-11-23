<?php

use Bojaghi\Continy\Continy;
use SWM\MapNoteWP\Modules;

if (!defined('ABSPATH')) {
    exit;
}

return [
    'main_file' => dirname(__DIR__) . '/map-note-wp.php',
    'version'   => '0.0.0',
    'hooks'     => [
        'init' => 0,
    ],
    'arguments' => [
        'viteScripts' => function (Continy $continy) {
            return [
                [
                    'distBaseUrl'  => plugins_url('dist', $continy->getMain()),
                    'isProd'       => false,
                    'manifestPath' => plugin_dir_path($continy->getMain()) . 'dist/.vite/manifest.json',
                ]
            ];
        }
    ],
    'bindings'  => [
        'naverMapScripts'  => Modules\NaverMapScripts::class,
        'templateRedirect' => Modules\TemplateRedirect::class,
        'viteScripts'      => Bojaghi\ViteScripts\ViteScript::class,
    ],
    'modules'   => [
        'init' => [
            Continy::PR_HIGH    => [
                'naverMapScripts',
                'viteScripts',
            ],
            Continy::PR_DEFAULT => [
                'templateRedirect'
            ],
        ]
    ],
];
