<?php
/**
 * 404 Error Page Template
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

get_header();
?>

<main class="site-main">
    <section class="error-404">
        <h1>404</h1>
        <h2><?php esc_html_e( 'Page Not Found', 'aqsa-lms' ); ?></h2>
        <p><?php esc_html_e( 'Oops! The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'aqsa-lms' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
            <?php esc_html_e( 'Back to Home', 'aqsa-lms' ); ?>
        </a>
    </section>
</main>

<?php
get_footer();
