<?php
/**
 * Main Index Template
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

get_header();
?>

<main class="site-main">
    <div class="blog-grid">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article class="post-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-thumbnail">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium' ); ?>
                        <?php else : ?>
                            <img src="<?php echo AQSA_LMS_URI; ?>/assets/images/blog-placeholder.svg" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <?php aqsa_lms_posted_on(); ?>
                            <?php aqsa_lms_posted_by(); ?>
                        </div>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="post-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">
                            <?php esc_html_e( 'Read More', 'aqsa-lms' ); ?>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </article>
                <?php
            endwhile;

            // Pagination
            the_posts_pagination(
                array(
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Previous', 'aqsa-lms' ),
                    'next_text' => __( 'Next &raquo;', 'aqsa-lms' ),
                )
            );
        else :
            ?>
            <div class="no-results">
                <h2><?php esc_html_e( 'Nothing Found', 'aqsa-lms' ); ?></h2>
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'aqsa-lms' ); ?></p>
                <?php get_search_form(); ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
