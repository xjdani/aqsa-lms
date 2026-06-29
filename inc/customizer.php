<?php
/**
 * Customizer Settings
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aqsa_lms_customize_register' ) ) :
    /**
     * Add customizer settings.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function aqsa_lms_customize_register( $wp_customize ) {
        // Hero Section
        $wp_customize->add_section(
            'aqsa_lms_hero_section',
            array(
                'title'    => __( 'Hero Section', 'aqsa-lms' ),
                'priority' => 30,
            )
        );

        // Hero Title
        $wp_customize->add_setting(
            'aqsa_lms_hero_title',
            array(
                'default'           => __( 'Transform Your Learning Experience', 'aqsa-lms' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'aqsa_lms_hero_title',
            array(
                'label'   => __( 'Hero Title', 'aqsa-lms' ),
                'section' => 'aqsa_lms_hero_section',
                'type'    => 'text',
            )
        );

        // Hero Subtitle
        $wp_customize->add_setting(
            'aqsa_lms_hero_subtitle',
            array(
                'default'           => __( 'Unlock your potential with our comprehensive online courses and expert-led training programs.', 'aqsa-lms' ),
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );

        $wp_customize->add_control(
            'aqsa_lms_hero_subtitle',
            array(
                'label'   => __( 'Hero Subtitle', 'aqsa-lms' ),
                'section' => 'aqsa_lms_hero_section',
                'type'    => 'textarea',
            )
        );

        // Hero Button Text
        $wp_customize->add_setting(
            'aqsa_lms_hero_button_text',
            array(
                'default'           => __( 'Get Started Free', 'aqsa-lms' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'aqsa_lms_hero_button_text',
            array(
                'label'   => __( 'Hero Button Text', 'aqsa-lms' ),
                'section' => 'aqsa_lms_hero_section',
                'type'    => 'text',
            )
        );

        // Hero Button URL
        $wp_customize->add_setting(
            'aqsa_lms_hero_button_url',
            array(
                'default'           => '#',
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            'aqsa_lms_hero_button_url',
            array(
                'label'   => __( 'Hero Button URL', 'aqsa-lms' ),
                'section' => 'aqsa_lms_hero_section',
                'type'    => 'url',
            )
        );

        // CTA Section
        $wp_customize->add_section(
            'aqsa_lms_cta_section',
            array(
                'title'    => __( 'CTA Section', 'aqsa-lms' ),
                'priority' => 35,
            )
        );

        // CTA Title
        $wp_customize->add_setting(
            'aqsa_lms_cta_title',
            array(
                'default'           => __( 'Ready to Start Learning?', 'aqsa-lms' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'aqsa_lms_cta_title',
            array(
                'label'   => __( 'CTA Title', 'aqsa-lms' ),
                'section' => 'aqsa_lms_cta_section',
                'type'    => 'text',
            )
        );

        // CTA Description
        $wp_customize->add_setting(
            'aqsa_lms_cta_description',
            array(
                'default'           => __( 'Join thousands of students already learning with Aqsa LMS. Start your journey today!', 'aqsa-lms' ),
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );

        $wp_customize->add_control(
            'aqsa_lms_cta_description',
            array(
                'label'   => __( 'CTA Description', 'aqsa-lms' ),
                'section' => 'aqsa_lms_cta_section',
                'type'    => 'textarea',
            )
        );

        // Footer Settings
        $wp_customize->add_section(
            'aqsa_lms_footer_section',
            array(
                'title'    => __( 'Footer Settings', 'aqsa-lms' ),
                'priority' => 40,
            )
        );

        // Footer Copyright Text
        $wp_customize->add_setting(
            'aqsa_lms_footer_copyright',
            array(
                'default'           => __( '&copy; 2024 Aqsa LMS. All rights reserved.', 'aqsa-lms' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'aqsa_lms_footer_copyright',
            array(
                'label'   => __( 'Copyright Text', 'aqsa-lms' ),
                'section' => 'aqsa_lms_footer_section',
                'type'    => 'text',
            )
        );
    }
endif;
add_action( 'customize_register', 'aqsa_lms_customize_register' );
