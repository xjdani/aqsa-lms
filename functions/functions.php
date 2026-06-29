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
require_once AQSA_LMS_DIR . '/functions/theme-setup.php';
require_once AQSA_LMS_DIR . '/functions/enqueue-scripts.php';
require_once AQSA_LMS_DIR . '/functions/customizer.php';
require_once AQSA_LMS_DIR . '/functions/template-functions.php';
require_once AQSA_LMS_DIR . '/functions/template-tags.php';
require_once AQSA_LMS_DIR . '/functions/widgets.php';
require_once AQSA_LMS_DIR . '/functions/customiser/site-identity/site-logo.php';
require_once AQSA_LMS_DIR . '/functions/customiser/menus/primary.php';
require_once AQSA_LMS_DIR . '/functions/customiser/menus/mobile.php';
require_once AQSA_LMS_DIR . '/functions/features/dark-mode.php';
require_once AQSA_LMS_DIR . '/functions/features/search.php';
require_once AQSA_LMS_DIR . '/functions/features/account.php';
