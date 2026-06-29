<?php
/**
 * Mobile Menu Settings
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aqsa_lms_register_mobile_menu' ) ) :
    function aqsa_lms_register_mobile_menu() {
        register_nav_menu( 'mobile', esc_html__( 'Mobile Menu', 'aqsa-lms' ) );
    }
endif;
add_action( 'after_setup_theme', 'aqsa_lms_register_mobile_menu' );
