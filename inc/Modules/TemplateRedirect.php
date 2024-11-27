<?php

namespace SWM\MapNoteWP\Modules;

use Bojaghi\Contract\Module;
use Bojaghi\ViteScripts\ViteScript;
use SWM\MapNoteWP\Supports\MapNoteView;

class TemplateRedirect implements Module
{
    public function __construct(
        private NaverMapScripts $naverMapScripts,
        private ViteScript      $viteScript,
    )
    {
        add_action('template_redirect', [$this, 'templateRedirect'], 9999);
    }

    public function templateRedirect(): void
    {
        if (($post = get_post()) && 'map-note' === $post->post_name) {
            mapNoteGet(MapNoteView::class)->display();
            exit;
        }
    }

    public function prepareBlankTemplate(): void
    {
        if (has_action('wp_footer', 'the_block_template_skip_link')) {
            remove_action('wp_footer', 'the_block_template_skip_link');
        }

        wp_deregister_script('hoverintent-js');
        wp_deregister_style('dashicons');
    }

    public function enqueueNaverMaps(): void
    {
        $this->naverMapScripts->enqueueNaverMap();

        $this->viteScript->add(
            handle: 'map-note',
            relPath: 'src/map-note.tsx',
        );
    }
}
