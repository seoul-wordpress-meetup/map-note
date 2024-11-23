<?php

namespace SWM\MapNoteWP\Modules;

use Bojaghi\Contract\Module;
use SWM\MapNoteWP\Views\MapNoteView;

class TemplateRedirect implements Module
{
    public function __construct()
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
}
