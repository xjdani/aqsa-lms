<?php
/**
 * Mobile Header Template
 *
 * @package Aqsa_LMS
 */

$logo_id        = get_theme_mod('custom_logo');
$show_site_title = display_header_text();
$site_title     = get_bloginfo('name');
$is_logged_in   = is_user_logged_in();
$dashboard_url  = $is_logged_in ? site_url('/dashboard') : '#';

if ( ! class_exists('Aqsa_LMS_Mobile_Walker') ) :
    class Aqsa_LMS_Mobile_Walker extends Walker_Nav_Menu {
        public function start_lvl(&$output, $depth = 0, $args = null) {
            $output .= '<ul class="ml-4 border-l border-gray-200 dark:border-gray-700 pl-4 mt-1 mb-2">';
        }
        public function end_lvl(&$output, $depth = 0, $args = null) {
            $output .= '</ul>';
        }
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $has_children = in_array('menu-item-has-children', $item->classes, true);
            $classes      = 'block px-4 py-3 text-sm font-medium rounded-xl transition-all hover:bg-gray-100 hover:text-blue-600 dark:hover:bg-gray-800 dark:hover:text-blue-400';
            $classes     .= in_array('current-menu-item', $item->classes, true)
                ? ' text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20'
                : ' text-gray-700 dark:text-gray-300';
            $output .= '<a href="' . esc_url($item->url) . '" class="' . $classes . '">';
            $output .= esc_html($item->title);
            $output .= '</a>';
        }
        public function end_el(&$output, $item, $depth = 0, $args = null) {
        }
    }
endif;
?>

<header class="md:hidden bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200/50 dark:border-gray-800 sticky top-0 z-50 transition-colors duration-300">

    <div class="flex items-center justify-between px-4 h-16">

        <div class="flex items-center gap-2 min-w-0 max-w-[55%]">
            <?php if (has_custom_logo() && $logo_id) : ?>
                <?php the_custom_logo(); ?>
            <?php endif; ?>
            <?php if ($show_site_title) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-lg font-bold tracking-tight text-gray-900 dark:text-white truncate">
                    <?php echo esc_html($site_title); ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="flex items-center gap-1">
            <?php aqsa_lms_dark_mode_toggle(); ?>
            <?php aqsa_lms_search_toggle(); ?>

            <?php if ($is_logged_in) : ?>
                <a href="<?php echo esc_url($dashboard_url); ?>" class="p-2.5 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-blue-600 dark:hover:text-blue-400 transition-all" aria-label="<?php esc_attr_e('Dashboard', 'aqsa-lms'); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
            <?php endif; ?>

            <button id="mobile-menu-toggle" class="p-2.5 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all" aria-label="<?php esc_attr_e('Toggle Menu', 'aqsa-lms'); ?>">
                <svg class="w-5 h-5" id="hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg class="w-5 h-5 hidden" id="close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <?php aqsa_lms_search_overlay(); ?>
</header>

<div id="mobile-drawer-overlay" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity duration-300"></div>

<div id="mobile-drawer" class="fixed top-0 right-0 h-full w-80 max-w-[85vw] bg-white dark:bg-gray-900 z-50 shadow-2xl translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">

    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-800">
        <span class="text-sm font-semibold text-gray-900 dark:text-white"><?php esc_html_e('Menu', 'aqsa-lms'); ?></span>
        <button id="mobile-drawer-close" class="p-2 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <?php if ( ! $is_logged_in ) : ?>
        <div class="p-4 border-b border-gray-200 dark:border-gray-800 flex gap-2">
            <a href="<?php echo esc_url(wp_login_url()); ?>" class="flex-1 text-center px-4 py-2.5 text-sm font-medium rounded-xl border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                <?php esc_html_e('Login', 'aqsa-lms'); ?>
            </a>
            <a href="<?php echo esc_url(wp_registration_url()); ?>" class="flex-1 text-center px-4 py-2.5 text-sm font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 dark:from-blue-500 dark:to-indigo-500 transition-all">
                <?php esc_html_e('Register', 'aqsa-lms'); ?>
            </a>
        </div>
    <?php endif; ?>

    <nav class="p-4">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'mobile',
            'container'      => false,
            'fallback_cb'    => false,
            'menu_class'     => 'space-y-1',
            'item_spacing'   => 'preserve',
            'walker'         => new Aqsa_LMS_Mobile_Walker(),
        ));
        ?>
    </nav>
</div>

<script>
(function() {
    var toggle = document.getElementById('mobile-menu-toggle');
    var drawer = document.getElementById('mobile-drawer');
    var overlay = document.getElementById('mobile-drawer-overlay');
    var close = document.getElementById('mobile-drawer-close');
    var hamIcon = document.getElementById('hamburger-icon');
    var closeIcon = document.getElementById('close-icon');
    if (!toggle || !drawer || !overlay || !close) return;

    function openDrawer() {
        drawer.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
        hamIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
    }

    function closeDrawer() {
        drawer.classList.add('translate-x-full');
        overlay.classList.add('hidden');
        hamIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    }

    toggle.addEventListener('click', function() {
        if (drawer.classList.contains('translate-x-full')) {
            openDrawer();
        } else {
            closeDrawer();
        }
    });

    close.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
})();
</script>
