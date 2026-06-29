<?php
/**
 * Dark Mode Feature
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function aqsa_lms_dark_mode_toggle() {
    ?>
    <button id="dark-mode-toggle" class="p-2.5 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-amber-500 dark:hover:text-amber-400 transition-all" aria-label="<?php esc_attr_e( 'Toggle Dark Mode', 'aqsa-lms' ); ?>">
        <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
        <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
    </button>
    <?php
}

function aqsa_lms_dark_mode_script() {
    ?>
    <script>
    (function() {
        const toggle = document.getElementById('dark-mode-toggle');
        const html = document.documentElement;
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
        if (toggle) {
            toggle.addEventListener('click', function() {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            });
        }
    })();
    </script>
    <?php
}
add_action( 'wp_footer', 'aqsa_lms_dark_mode_script' );
