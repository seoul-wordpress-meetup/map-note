<?php
/**
 * Plugin Name: Map Note
 * Description: Simple Naver maps integration
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'map_note_add_rewrite_rules' ) ) {
    function map_note_add_rewrite_rules(): void {
        add_rewrite_rule( 'map-note/(.*)$', 'wp-content/plugins/map-note/dist/$1', 'top' );
    }
    add_action( 'init', 'map_note_add_rewrite_rules' );
}

if ( ! function_exists( 'map_note_query_vars' ) ) {
    function map_note_query_vars( array $vars ): array {
        return [...$vars, 'map-note'];
    }
    add_filter( 'query_vars', 'map_note_query_vars' );
}

if ( ! function_exists( 'map_note_template_redirect' ) ) {
    function map_note_template_redirect(): void {
        if ( 'map-note' == get_query_var( 'map-note' ) ) {
            echo 'okay!';
            exit;
        }
    }
    add_action( 'template_redirect', 'map_note_template_redirect' );
}

require_once __DIR__ . '/inc/admin/settings.php';
