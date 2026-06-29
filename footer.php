<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <h3><?php bloginfo( 'name' ); ?></h3>
                <p><?php esc_html_e( 'Empowering learners worldwide with high-quality online education. Start your learning journey today.', 'aqsa-lms' ); ?></p>
            </div>

            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
            <?php else : ?>
                <div class="footer-widget">
                    <h4><?php esc_html_e( 'Quick Links', 'aqsa-lms' ); ?></h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About Us', 'aqsa-lms' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/courses' ) ); ?>"><?php esc_html_e( 'Courses', 'aqsa-lms' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/pricing' ) ); ?>"><?php esc_html_e( 'Pricing', 'aqsa-lms' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'aqsa-lms' ); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
            <?php else : ?>
                <div class="footer-widget">
                    <h4><?php esc_html_e( 'Resources', 'aqsa-lms' ); ?></h4>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'aqsa-lms' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'aqsa-lms' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/support' ) ); ?>"><?php esc_html_e( 'Support', 'aqsa-lms' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'aqsa-lms' ); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
            <?php else : ?>
                <div class="footer-widget">
                    <h4><?php esc_html_e( 'Connect', 'aqsa-lms' ); ?></h4>
                    <ul>
                        <li><a href="#"><?php esc_html_e( 'Facebook', 'aqsa-lms' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Twitter', 'aqsa-lms' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'LinkedIn', 'aqsa-lms' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Instagram', 'aqsa-lms' ); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-bottom">
            <p><?php echo esc_html( get_theme_mod( 'aqsa_lms_footer_copyright', '&copy; 2024 Aqsa LMS. All rights reserved.' ) ); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
