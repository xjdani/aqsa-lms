<?php
/**
 * Desktop Header Template
 *
 * @package Aqsa_LMS
 */
?>

<header class="site-header desktop-header">
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

        <nav class="main-navigation desktop-nav" id="site-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'primary-menu-list',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </nav>

        <div class="header-cta">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'pricing' ) ) ? get_page_by_path( 'pricing' )->ID : '#' ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'Get Started', 'aqsa-lms' ); ?>
            </a>
        </div>
    </div>
</header>
