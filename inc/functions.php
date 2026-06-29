<?php
/**
 * Aqsa LMS Theme Functions
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define theme constants
 */
define( 'AQSA_LMS_VERSION', '1.0.0' );
define( 'AQSA_LMS_DIR', get_template_directory() );
define( 'AQSA_LMS_URI', get_template_directory_uri() );

/**
 * Include required files
 */
require_once AQSA_LMS_DIR . '/inc/theme-setup.php';
require_once AQSA_LMS_DIR . '/inc/enqueue-scripts.php';
require_once AQSA_LMS_DIR . '/inc/customizer.php';
require_once AQSA_LMS_DIR . '/inc/template-functions.php';
require_once AQSA_LMS_DIR . '/inc/template-tags.php';
require_once AQSA_LMS_DIR . '/inc/widgets.php';
