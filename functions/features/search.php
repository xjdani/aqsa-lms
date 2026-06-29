<?php
/**
 * Search Feature
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function aqsa_lms_search_toggle() {
    ?>
    <button id="search-toggle" class="p-2.5 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-blue-600 dark:hover:text-blue-400 transition-all" aria-label="<?php esc_attr_e( 'Search', 'aqsa-lms' ); ?>">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </button>
    <?php
}

function aqsa_lms_search_overlay() {
    ?>
    <div id="search-overlay" class="hidden absolute top-full left-0 w-full bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-b border-gray-200/50 dark:border-gray-800 p-4 shadow-lg">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="max-w-7xl mx-auto flex gap-3">
            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search courses...', 'aqsa-lms' ); ?>" class="flex-1 px-4 py-2.5 border border-gray-300 dark:border-gray-700 rounded-xl bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none">
            <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition-all shadow-sm hover:shadow-md"><?php esc_html_e( 'Search', 'aqsa-lms' ); ?></button>
            <button type="button" id="search-close" class="px-4 py-2.5 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 font-medium rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition-all"><?php esc_html_e( 'Close', 'aqsa-lms' ); ?></button>
        </form>
    </div>
    <?php
}

function aqsa_lms_search_script() {
    ?>
    <script>
    (function() {
        const toggle = document.getElementById('search-toggle');
        const overlay = document.getElementById('search-overlay');
        const close = document.getElementById('search-close');
        if (!toggle || !overlay || !close) return;
        const input = overlay.querySelector('input[type="search"]');
        toggle.addEventListener('click', function() {
            overlay.classList.toggle('hidden');
            if (!overlay.classList.contains('hidden') && input) {
                setTimeout(function() { input.focus(); }, 100);
            }
        });
        close.addEventListener('click', function() { overlay.classList.add('hidden'); });
        document.addEventListener('click', function(e) {
            if (!overlay.contains(e.target) && e.target !== toggle) {
                overlay.classList.add('hidden');
            }
        });
    })();
    </script>
    <?php
}
add_action( 'wp_footer', 'aqsa_lms_search_script' );
