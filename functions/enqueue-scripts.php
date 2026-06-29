<?php
/**
 * Enqueue Scripts and Styles
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aqsa_lms_scripts' ) ) :
    /**
     * Enqueue scripts and styles.
     */
    function aqsa_lms_scripts() {
        // Google Fonts - Inter
        wp_enqueue_style(
            'aqsa-lms-google-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
            array(),
            null
        );

        // Main stylesheet from assets
        wp_enqueue_style(
            'aqsa-lms-main-style',
            AQSA_LMS_URI . '/assets/css/style.css',
            array(),
            AQSA_LMS_VERSION
        );

        // Theme stylesheet (required by WordPress)
        wp_enqueue_style(
            'aqsa-lms-style',
            get_stylesheet_uri(),
            array('aqsa-lms-main-style'),
            AQSA_LMS_VERSION
        );

        // Theme JavaScript
        wp_enqueue_script(
            'aqsa-lms-scripts',
            AQSA_LMS_URI . '/assets/js/main.js',
            array(),
            AQSA_LMS_VERSION,
            true
        );

        // Comment reply script
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        // Localize script for AJAX
        wp_localize_script(
            'aqsa-lms-scripts',
            'aqsaLmsAjax',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce'   => wp_create_nonce( 'aqsa-lms-nonce' ),
            )
        );
    }
endif;
add_action( 'wp_enqueue_scripts', 'aqsa_lms_scripts' );
