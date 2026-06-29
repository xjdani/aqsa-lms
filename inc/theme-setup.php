<?php
/**
 * Theme Setup
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aqsa_lms_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function aqsa_lms_setup() {
        /*
         * Make the theme available for translation.
         */
        load_theme_textdomain( 'aqsa-lms', AQSA_LMS_DIR . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 675, true );

        // Register navigation menus.
        register_nav_menus( array(
            'primary'   => esc_html__( 'Primary Menu', 'aqsa-lms' ),
            'footer'    => esc_html__( 'Footer Menu', 'aqsa-lms' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Set up the WordPress custom logo support.
        add_theme_support( 'custom-logo', array(
            'height'      => 80,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        // Add support for custom background.
        add_theme_support( 'custom-background', array(
            'default-color' => 'ffffff',
        ) );

        // Add support for custom header.
        add_theme_support( 'custom-header', array(
            'default-image'      => '',
            'default-text-color' => '1e293b',
            'width'              => 1920,
            'height'             => 400,
            'flex-width'         => true,
            'flex-height'        => true,
        ) );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        // Add support for custom line height controls.
        add_theme_support( 'custom-line-height' );

        // Add support for experimental link color control.
        add_theme_support( 'experimental-link-color' );

        // Add support for custom spacing.
        add_theme_support( 'custom-spacing' );

        // Add support for appearance tools.
        add_theme_support( 'appearance-tools' );

        // Add support for site logo.
        add_theme_support( 'site-logo' );
    }
endif;
add_action( 'after_setup_theme', 'aqsa_lms_setup' );

/**
 * Set the content width in pixels.
 *
 * @global int $content_width
 */
function aqsa_lms_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'aqsa_lms_content_width', 1200 );
}
add_action( 'after_setup_theme', 'aqsa_lms_content_width', 0 );
