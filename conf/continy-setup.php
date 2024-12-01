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
        'customFields'     => [__DIR__ . '/custom-fields.php'],
        'customPosts'      => [__DIR__ . '/custom-posts.php'],
        'customTaxonomies' => [__DIR__ . '/custom-taxonomies.php'],
        'naverMapScripts'  => [defined('NCLOUD_CLIENT_ID') ? NCLOUD_CLIENT_ID : ''],
        'options'          => [__DIR__ . '/options.php'],
        'template'         => [['scopes' => [dirname(__DIR__) . '/inc/Templates']]],
        'viteScripts'      => fn(Continy $continy) => [
            [
                'distBaseUrl'  => plugins_url('dist', $continy->getMain()),
                'isProd'       => false,
                'manifestPath' => plugin_dir_path($continy->getMain()) . 'dist/.vite/manifest.json',
            ]
        ],
    ],
    'bindings'  => [
        // Bojaghi vendors
        'customFields'     => Bojaghi\Fields\Modules\CustomFields::class,
        'customPosts'      => Bojaghi\Cpt\CustomPosts::class,
        'customTaxonomies' => Bojaghi\Tax\CustomTaxonomies::class,
        'template'         => Bojaghi\Template\Template::class,
        'viteScripts'      => Bojaghi\ViteScripts\ViteScript::class,
        // In-house modules
        'admin/Post'       => Modules\Admin\Post::class,
        'admin/settings'   => Modules\Admin\Settings::class,
        'kses'             => Modules\KSES::class,
        'naverMapScripts'  => Modules\NaverMapScripts::class,
        'options'          => Modules\Options::class,
        'templateRedirect' => Modules\TemplateRedirect::class,
    ],
    'modules'   => [
        'admin_init' => [
            Continy::PR_DEFAULT => [
                'admin/Post',
            ],
        ],
        'init'       => [
            Continy::PR_HIGH    => [
                'template',
                'naverMapScripts',
                'viteScripts',
            ],
            Continy::PR_DEFAULT => [
                'admin/settings',
                'customFields',
                'customPosts',
                'customTaxonomies',
                'kses',
                'options',
                'templateRedirect',
            ],
        ]
    ],
];
