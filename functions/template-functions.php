<?php
/**
 * Template Functions
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'aqsa_lms_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function aqsa_lms_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        echo '<span class="posted-on">' . $time_string . '</span>';
    }
endif;

if ( ! function_exists( 'aqsa_lms_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function aqsa_lms_posted_by() {
        echo '<span class="byline"> <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>';
    }
endif;

if ( ! function_exists( 'aqsa_lms_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function aqsa_lms_entry_footer() {
        if ( 'post' === get_post_type() ) {
            $categories_list = get_the_category_list( ', ' );
            if ( $categories_list ) {
                printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'aqsa-lms' ) . '</span>', $categories_list );
            }

            $tags_list = get_the_tag_list( '', ', ' );
            if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'aqsa-lms' ) . '</span>', $tags_list );
            }
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'aqsa-lms' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }
    }
endif;

if ( ! function_exists( 'aqsa_lms_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     */
    function aqsa_lms_post_thumbnail( $size = 'post-thumbnail' ) {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( $size ); ?>
            </div>
        <?php else : ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    $size,
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>
            <?php
        endif;
    }
endif;

if ( ! function_exists( 'aqsa_lms_hero_section' ) ) :
    /**
     * Display hero section on front page.
     */
    function aqsa_lms_hero_section() {
        $hero_title       = get_theme_mod( 'aqsa_lms_hero_title', __( 'Transform Your Learning Experience', 'aqsa-lms' ) );
        $hero_subtitle    = get_theme_mod( 'aqsa_lms_hero_subtitle', __( 'Unlock your potential with our comprehensive online courses and expert-led training programs.', 'aqsa-lms' ) );
        $hero_button_text = get_theme_mod( 'aqsa_lms_hero_button_text', __( 'Get Started Free', 'aqsa-lms' ) );
        $hero_button_url  = get_theme_mod( 'aqsa_lms_hero_button_url', '#' );
        ?>
        <section class="hero-section">
            <div class="hero-container">
                <div class="hero-content">
                    <h1><?php echo esc_html( $hero_title ); ?></h1>
                    <p class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
                    <div class="hero-buttons">
                        <a href="<?php echo esc_url( $hero_button_url ); ?>" class="btn btn-primary btn-large">
                            <?php echo esc_html( $hero_button_text ); ?>
                        </a>
                        <a href="#courses" class="btn btn-secondary btn-large">
                            <?php esc_html_e( 'View Courses', 'aqsa-lms' ); ?>
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="<?php echo AQSA_LMS_URI; ?>/assets/images/hero-placeholder.png" alt="<?php esc_attr_e( 'Learning Platform', 'aqsa-lms' ); ?>">
                </div>
            </div>
        </section>
        <?php
    }
endif;

if ( ! function_exists( 'aqsa_lms_features_section' ) ) :
    /**
     * Display features section on front page.
     */
    function aqsa_lms_features_section() {
        ?>
        <section class="features-section">
            <div class="container">
                <div class="section-header">
                    <h2><?php esc_html_e( 'Why Choose Aqsa LMS?', 'aqsa-lms' ); ?></h2>
                    <p><?php esc_html_e( 'Everything you need to create, manage, and deliver exceptional online learning experiences.', 'aqsa-lms' ); ?></p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">📚</div>
                        <h3><?php esc_html_e( 'Comprehensive Courses', 'aqsa-lms' ); ?></h3>
                        <p><?php esc_html_e( 'Access hundreds of professionally designed courses across multiple disciplines and skill levels.', 'aqsa-lms' ); ?></p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🎯</div>
                        <h3><?php esc_html_e( 'Personalized Learning', 'aqsa-lms' ); ?></h3>
                        <p><?php esc_html_e( 'AI-powered recommendations tailor your learning path based on your goals and progress.', 'aqsa-lms' ); ?></p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🏆</div>
                        <h3><?php esc_html_e( 'Certification Programs', 'aqsa-lms' ); ?></h3>
                        <p><?php esc_html_e( 'Earn industry-recognized certificates upon completion to boost your career prospects.', 'aqsa-lms' ); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;

if ( ! function_exists( 'aqsa_lms_pricing_section' ) ) :
    /**
     * Display pricing section on front page.
     */
    function aqsa_lms_pricing_section() {
        ?>
        <section class="pricing-section">
            <div class="container">
                <div class="section-header">
                    <h2><?php esc_html_e( 'Simple, Transparent Pricing', 'aqsa-lms' ); ?></h2>
                    <p><?php esc_html_e( 'Choose the plan that fits your learning needs. No hidden fees.', 'aqsa-lms' ); ?></p>
                </div>
                <div class="pricing-grid">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3><?php esc_html_e( 'Starter', 'aqsa-lms' ); ?></h3>
                        </div>
                        <div class="pricing-amount">$9<span>/month</span></div>
                        <ul class="pricing-features">
                            <li><?php esc_html_e( 'Access to 50+ courses', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Basic quizzes & assessments', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Community forum access', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Mobile app access', 'aqsa-lms' ); ?></li>
                        </ul>
                        <a href="#" class="btn btn-secondary"><?php esc_html_e( 'Get Started', 'aqsa-lms' ); ?></a>
                    </div>
                    <div class="pricing-card popular">
                        <div class="pricing-header">
                            <h3><?php esc_html_e( 'Professional', 'aqsa-lms' ); ?></h3>
                        </div>
                        <div class="pricing-amount">$29<span>/month</span></div>
                        <ul class="pricing-features">
                            <li><?php esc_html_e( 'Access to 200+ courses', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Advanced projects & exercises', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Priority support', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Downloadable resources', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Certificate of completion', 'aqsa-lms' ); ?></li>
                        </ul>
                        <a href="#" class="btn btn-primary"><?php esc_html_e( 'Get Started', 'aqsa-lms' ); ?></a>
                    </div>
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3><?php esc_html_e( 'Enterprise', 'aqsa-lms' ); ?></h3>
                        </div>
                        <div class="pricing-amount">$99<span>/month</span></div>
                        <ul class="pricing-features">
                            <li><?php esc_html_e( 'Unlimited course access', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( '1-on-1 mentoring sessions', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Custom learning paths', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'Team collaboration tools', 'aqsa-lms' ); ?></li>
                            <li><?php esc_html_e( 'API access', 'aqsa-lms' ); ?></li>
                        </ul>
                        <a href="#" class="btn btn-secondary"><?php esc_html_e( 'Contact Sales', 'aqsa-lms' ); ?></a>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;

if ( ! function_exists( 'aqsa_lms_cta_section' ) ) :
    /**
     * Display CTA section on front page.
     */
    function aqsa_lms_cta_section() {
        $cta_title       = get_theme_mod( 'aqsa_lms_cta_title', __( 'Ready to Start Learning?', 'aqsa-lms' ) );
        $cta_description = get_theme_mod( 'aqsa_lms_cta_description', __( 'Join thousands of students already learning with Aqsa LMS. Start your journey today!', 'aqsa-lms' ) );
        ?>
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2><?php echo esc_html( $cta_title ); ?></h2>
                    <p><?php echo esc_html( $cta_description ); ?></p>
                    <a href="#" class="btn btn-primary btn-large"><?php esc_html_e( 'Start Free Trial', 'aqsa-lms' ); ?></a>
                </div>
            </div>
        </section>
        <?php
    }
endif;
