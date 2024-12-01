<?php
/**
 * Option form for
 *
 * @var Template $this
 * @var string   $option_group Setting group name for settings_fields()
 * @var string   $page_slug    Slug for do_settings_sections()
 */

use Bojaghi\Template\Template;

$this->extends('admin/option-form-base')
     ->assign(
         'markup.before',
         '<div class="wrap">' .
         '<h1 class="wp-heading-inline">' . esc_html__('Map Note Settings', 'map-note-wp') . '</h1>' .
         '<hr class="wp-header-end" />',
     )
     ->assign('markup.after', '</div>')
     ->assign('option_group', $this->get('option_group'))
     ->assign('page_slug', $this->get('page_slug'))
;
