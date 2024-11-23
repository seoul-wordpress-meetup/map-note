<?php

namespace SWM\MapNoteWP\Views;

use Bojaghi\ViteScripts\ViteScript;
use SWM\MapNoteWP\Modules\NaverMapScripts;

class MapNoteView implements View
{
    public function __construct(
        private NaverMapScripts $naverMapScripts,
        private ViteScript      $viteScript,
    )
    {
    }

    public function display(): void
    {
        if (has_action('wp_footer', 'the_block_template_skip_link')) {
            remove_action('wp_footer', 'the_block_template_skip_link');
        }

        wp_deregister_script('hoverintent-js');
        wp_deregister_style('dashicons');

        $this->naverMapScripts->enqueueNaverMap();

        $this->viteScript->add(
            handle: 'map-note',
            relPath: 'src/map-note.tsx',
        );
        // @formatter:off
        ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>Map Note</title>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
    <div id="root"></div>
    <?php wp_print_footer_scripts(); ?>
</body>
</html>
        <?php
        // @formatter:on
    }
}
