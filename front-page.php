<?php
/**
 * Front Page Template
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

get_header();
?>

<main class="site-main">
    <?php
    // Display hero section
    aqsa_lms_hero_section();

    // Display features section
    aqsa_lms_features_section();

    // Display courses section (if posts exist)
    if ( have_posts() ) :
        ?>
        <section class="courses-section" id="courses">
            <div class="container">
                <div class="section-header">
                    <h2><?php esc_html_e( 'Featured Courses', 'aqsa-lms' ); ?></h2>
                    <p><?php esc_html_e( 'Explore our most popular courses and start learning today.', 'aqsa-lms' ); ?></p>
                </div>
                <div class="courses-grid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <article class="course-card">
                            <div class="course-thumbnail">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                <?php endif; ?>
                                <span class="course-badge"><?php esc_html_e( 'Popular', 'aqsa-lms' ); ?></span>
                            </div>
                            <div class="course-content">
                                <span class="course-category"><?php esc_html_e( 'Development', 'aqsa-lms' ); ?></span>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="course-meta">
                                    <span class="course-students">
                                        <span>&#128101;</span> <?php echo esc_html( mt_rand( 100, 5000 ) ); ?> <?php esc_html_e( 'students', 'aqsa-lms' ); ?>
                                    </span>
                                    <span class="course-price">$<?php echo esc_html( mt_rand( 19, 199 ) ); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
        <?php
    endif;

    // Display pricing section
    aqsa_lms_pricing_section();

    // Display testimonials section
    ?>
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2><?php esc_html_e( 'What Our Students Say', 'aqsa-lms' ); ?></h2>
                <p><?php esc_html_e( 'Join thousands of satisfied learners who have transformed their careers.', 'aqsa-lms' ); ?></p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="testimonial-content">"Aqsa LMS completely changed my career path. The courses are well-structured and the instructors are top-notch!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="<?php echo AQSA_LMS_URI; ?>/assets/images/avatar-1.png" alt="<?php esc_attr_e( 'Student', 'aqsa-lms' ); ?>">
                        </div>
                        <div class="author-info">
                            <h4><?php esc_html_e( 'Sarah Johnson', 'aqsa-lms' ); ?></h4>
                            <p><?php esc_html_e( 'Web Developer', 'aqsa-lms' ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-content">"The best investment I've made in my education. The practical projects helped me land my dream job."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="<?php echo AQSA_LMS_URI; ?>/assets/images/avatar-2.png" alt="<?php esc_attr_e( 'Student', 'aqsa-lms' ); ?>">
                        </div>
                        <div class="author-info">
                            <h4><?php esc_html_e( 'Michael Chen', 'aqsa-lms' ); ?></h4>
                            <p><?php esc_html_e( 'Data Scientist', 'aqsa-lms' ); ?></p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-content">"Flexible learning schedule and high-quality content. Perfect for working professionals like me!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="<?php echo AQSA_LMS_URI; ?>/assets/images/avatar-3.png" alt="<?php esc_attr_e( 'Student', 'aqsa-lms' ); ?>">
                        </div>
                        <div class="author-info">
                            <h4><?php esc_html_e( 'Emily Rodriguez', 'aqsa-lms' ); ?></h4>
                            <p><?php esc_html_e( 'UX Designer', 'aqsa-lms' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

    // Display CTA section
    aqsa_lms_cta_section();
    ?>
</main>

<?php
get_footer();
