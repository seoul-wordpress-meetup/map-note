<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'map_note_register_settings' ) ) {
	function map_note_register_settings(): void {
		register_setting( 'map_note_settings', 'map_note_settings', [
			'type'              => 'object',
			'label'             => __( 'Map Note Options', 'map-note' ),
			'description'       => __( '', 'map-note' ),
			'sanitize_callback' => fn( $v ) => [],
			'default'           => [],
		] );
	}

	add_action( 'init', 'map_note_register_settings' );
}

if ( ! function_exists( 'map_note_settings_menu' ) ) {
	function map_note_settings_menu(): void {
		add_options_page( 'Map Note Settings', 'Map Note', 'manage_options', 'map-note-settings', 'map_note_output_settings_page' );
	}

	add_action( 'admin_menu', 'map_note_settings_menu' );
}

if ( ! function_exists( 'map_note_output_settings_page' ) ) {
	function map_note_output_settings_page(): void {
		add_settings_section( 'map-note-naver-map', __( 'Naver Map', 'map-note' ), '__return_empty_string', 'map-note-settings' );
		?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Map Note Settings', 'map-note' ); ?></h1>
            <hr class="wp-header-end"/>
            <form id="map-note-settings" name="map-note-settings" method="post"
                  action="<?php echo admin_url( 'options.php' ); ?>">
				<?php settings_fields( 'map_note_settings' ); ?>
				<?php do_settings_sections( 'map-note-settings' ); ?>
            </form>
        </div>
		<?php
	}
}
