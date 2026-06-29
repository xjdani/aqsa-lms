<?php
/**
 * Primary Menu Settings
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aqsa_lms_register_primary_menu' ) ) :
    function aqsa_lms_register_primary_menu() {
        register_nav_menu( 'primary', esc_html__( 'Primary Menu (Desktop)', 'aqsa-lms' ) );
    }
endif;
add_action( 'after_setup_theme', 'aqsa_lms_register_primary_menu' );
