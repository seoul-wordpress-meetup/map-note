<?php

namespace SWM\MapNoteWP\Modules;

use Bojaghi\Contract\Module;

class KSES implements Module
{
    public function __construct()
    {
        add_filter('wp_kses_allowed_html', [$this, 'addAllowedTags'], 10, 2);
    }

    public function addAllowedTags(array $html, string $context): array
    {
        if ('admin/settings' === $context) {
            $html = [
                'div'    => ['id' => true, 'class' => true],
                'form'   => ['id' => true, 'class' => true, 'action' => true, 'method' => true],
                'h1'     => ['id' => true, 'class' => true],
                'h2'     => ['id' => true, 'class' => true],
                'hr'     => ['id' => true, 'class' => true],
                'input'  => ['id' => true, 'class' => true, 'name' => true, 'type' => true, 'value' => true],
                'label'  => ['id' => true, 'class' => true, 'for' => true],
                'option' => ['id' => true, 'class' => true, 'value' => true, 'selected' => true],
                'p'      => ['id' => true, 'class' => true],
                'select' => ['id' => true, 'class' => true, 'name' => true],
                'table'  => ['id' => true, 'class' => true, 'role' => true],
                'td'     => ['id' => true, 'class' => true],
                'th'     => ['id' => true, 'class' => true, 'scope' => true],
                'tr'     => ['id' => true, 'class' => true],
            ];
        }

        return $html;
    }
}
