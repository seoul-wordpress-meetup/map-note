<?php
/**
 * Plugin Name:       Map Note for WP
 * Description:       Add descriptions to your favorite locations.
 * Plugin URI:        https://github.com/seoul-wordpress-meetup/map-note-wp
 * Author:            Seoul WordPress Meetup
 * Author URI:        https://www.meetup.com/ko-KR/wordpress-meetup-seoul/
 * Version:           0.0.0
 * Requires PHP:      8.0
 * Requires at least:
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

// 플러그인에서 도움이 되는 래퍼 함수 생성
if (!function_exists('mapNote')) {
    /**
     * Wrapper function
     *
     * @return \Bojaghi\Continy\Continy
     */
    function mapNote(): \Bojaghi\Continy\Continy
    {
        static $continy = null;

        if (is_null($continy)) {
            try {
                $continy = \Bojaghi\Continy\ContinyFactory::create(__DIR__ . '/inc/setup.php');
            } catch (\Bojaghi\Continy\COntinyException|\Bojaghi\Continy\ContinyNotFoundException $e) {
                wp_die($e->getMessage());
            }
        }

        return $continy;
    }
}

if (!function_exists('mapNoteGet')) {
    /**
     * @template T
     * @param class-string<T> $id
     *
     * @return T|object|null
     */
    function mapNoteGet(string $id): mixed
    {
        try {
            return mapNote()->get($id);
        } catch (\Bojaghi\Continy\COntinyException|\Bojaghi\Continy\ContinyNotFoundException $e) {
            return null;
        }
    }
}

mapNote();

