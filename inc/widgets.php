<?php
/**
 * Widget Areas
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aqsa_lms_widgets_init' ) ) :
    /**
     * Register widget area.
     */
    function aqsa_lms_widgets_init() {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Sidebar', 'aqsa-lms' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'aqsa-lms' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 1', 'aqsa-lms' ),
                'id'            => 'footer-1',
                'description'   => esc_html__( 'Add widgets here to appear in footer area 1.', 'aqsa-lms' ),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 2', 'aqsa-lms' ),
                'id'            => 'footer-2',
                'description'   => esc_html__( 'Add widgets here to appear in footer area 2.', 'aqsa-lms' ),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            )
        );

        register_sidebar(
            array(
                'name'          => esc_html__( 'Footer 3', 'aqsa-lms' ),
                'id'            => 'footer-3',
                'description'   => esc_html__( 'Add widgets here to appear in footer area 3.', 'aqsa-lms' ),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            )
        );
    }
endif;
add_action( 'widgets_init', 'aqsa_lms_widgets_init' );
