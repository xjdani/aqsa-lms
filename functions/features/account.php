<?php
/**
 * Account Feature
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function aqsa_lms_account_buttons() {
    $is_logged_in  = is_user_logged_in();
    $dashboard_url = $is_logged_in ? site_url( '/dashboard' ) : '#';
    ?>
    <div class="flex items-center gap-2">
        <?php if ( $is_logged_in ) : ?>
            <a href="<?php echo esc_url( $dashboard_url ); ?>" class="inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 dark:from-blue-500 dark:to-indigo-500 transition-all shadow-sm hover:shadow-md">
                <?php esc_html_e( 'Dashboard', 'aqsa-lms' ); ?>
            </a>
        <?php else : ?>
            <a href="<?php echo esc_url( wp_login_url() ); ?>" class="inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-xl border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all shadow-sm hover:shadow-md">
                <?php esc_html_e( 'Login', 'aqsa-lms' ); ?>
            </a>
            <a href="<?php echo esc_url( wp_registration_url() ); ?>" class="inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 dark:from-blue-500 dark:to-indigo-500 transition-all shadow-sm hover:shadow-md">
                <?php esc_html_e( 'Register', 'aqsa-lms' ); ?>
            </a>
        <?php endif; ?>
    </div>
    <?php
}
