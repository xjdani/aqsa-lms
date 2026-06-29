<?php
/**
 *
 * @package Aqsa_LMS
 *
 * Desktop Header Component
 */

$logo_id = get_theme_mod('custom_logo');
$show_site_title = display_header_text();
$site_title = get_bloginfo('name');

if ( ! class_exists( 'Aqsa_LMS_Nav_Walker' ) ) :
    class Aqsa_LMS_Nav_Walker extends Walker_Nav_Menu {
        public function start_lvl( &$output, $depth = 0, $args = null ) {
            $classes = 'absolute left-0 top-full min-w-48 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50';
            $output .= '<ul class="' . $classes . '">';
        }
        public function end_lvl( &$output, $depth = 0, $args = null ) {
            $output .= '</ul>';
        }
        public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
            $has_children = in_array( 'menu-item-has-children', $item->classes, true );
            $li_classes   = $has_children ? 'relative group' : '';
            $output      .= '<li class="' . $li_classes . '">';

            if ( 0 === $depth ) {
                $classes  = 'px-4 py-2.5 text-sm font-medium rounded-xl transition-all hover:bg-gray-100 hover:text-blue-600 dark:hover:bg-gray-800 dark:hover:text-blue-400';
                $classes .= in_array( 'current-menu-item', $item->classes, true )
                    ? ' text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20'
                    : ' text-gray-700 dark:text-gray-300';
                $classes .= $has_children ? ' inline-flex items-center gap-1' : '';
            } else {
                $classes  = 'block w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-blue-400 transition-colors';
                $classes .= in_array( 'current-menu-item', $item->classes, true )
                    ? ' text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20'
                    : '';
            }

            $output .= '<a href="' . esc_url( $item->url ) . '" class="' . $classes . '">';
            $output .= esc_html( $item->title );
            if ( $has_children && 0 === $depth ) {
                $output .= '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
            }
            $output .= '</a>';
        }
        public function end_el( &$output, $item, $depth = 0, $args = null ) {
            $output .= '</li>';
        }
    }
endif;
?>

<header class="hidden md:block bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200/50 dark:border-gray-800 sticky top-0 z-50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex-shrink-0 flex items-center gap-3">
                <?php if (has_custom_logo() && $logo_id) : ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>

                <?php if ($show_site_title) : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-bold tracking-tight text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <?php echo esc_html($site_title); ?>
                    </a>
                <?php endif; ?>
            </div>

            <nav class="hidden md:flex items-center">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'menu_class'     => 'flex items-center gap-1 list-none ps-0',
                    'item_spacing'   => 'preserve',
                    'walker'         => new Aqsa_LMS_Nav_Walker(),
                ));
                ?>
            </nav>

            <div class="flex items-center gap-3">
                <?php aqsa_lms_dark_mode_toggle(); ?>
                <?php aqsa_lms_search_toggle(); ?>
                <?php aqsa_lms_account_buttons(); ?>
            </div>
        </div>
    </div>

    <?php aqsa_lms_search_overlay(); ?>
</header>


