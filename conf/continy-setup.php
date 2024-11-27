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
        'admin_init' => 0,
        'init'       => 0,
    ],
    'arguments' => [
        'customPosts'      => [__DIR__ . '/custom-posts.php'],
        'customTaxonomies' => [__DIR__ . '/custom-taxonomies.php'],
        'naverMapScripts'  => [defined('NCLOUD_CLIENT_ID') ? NCLOUD_CLIENT_ID : ''],
        'viteScripts'      => fn(Continy $continy) => [
            [
                'distBaseUrl'  => plugins_url('dist', $continy->getMain()),
                'isProd'       => false,
                'manifestPath' => plugin_dir_path($continy->getMain()) . 'dist/.vite/manifest.json',
            ]
        ],
    ],
    'bindings'  => [
        'admin/Post'       => Modules\Admin\Post::class,
        'customPosts'      => Bojaghi\Cpt\CustomPosts::class,
        'customTaxonomies' => Bojaghi\Tax\CustomTaxonomies::class,
        'naverMapScripts'  => Modules\NaverMapScripts::class,
        'templateRedirect' => Modules\TemplateRedirect::class,
        'viteScripts'      => Bojaghi\ViteScripts\ViteScript::class,
    ],
    'modules'   => [
        'admin_init' => [
            Continy::PR_DEFAULT => [
                'admin/Post',
            ],
        ],
        'init'       => [
            Continy::PR_HIGH    => [
                'naverMapScripts',
                'viteScripts',
            ],
            Continy::PR_DEFAULT => [
                'customPosts',
                'customTaxonomies',
                'templateRedirect',
            ],
        ]
    ],
];
