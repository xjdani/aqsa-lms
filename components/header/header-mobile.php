<?php
/**
 * Mobile Header Template
 *
 * @package Aqsa_LMS
 */
?>

<header class="site-header mobile-header">
    <div class="container header-container">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            <?php endif; ?>
        </div>

        <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="<?php esc_attr_e( 'Toggle Menu', 'aqsa-lms' ); ?>">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>

    <nav class="main-navigation mobile-nav" id="mobile-navigation" aria-hidden="true">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu_id'        => 'mobile-primary-menu',
                'menu_class'     => 'mobile-menu-list',
                'fallback_cb'    => false,
            )
        );
        ?>
        <div class="mobile-header-cta">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'pricing' ) ) ? get_page_by_path( 'pricing' )->ID : '#' ); ?>" class="btn btn-primary btn-full">
                <?php esc_html_e( 'Get Started', 'aqsa-lms' ); ?>
            </a>
        </div>
    </nav>
</header>
