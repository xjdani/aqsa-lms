<?php
/**
 * Single Post Template
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

get_header();
?>

<main class="site-main">
    <article class="single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php while ( have_posts() ) : the_post(); ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <?php aqsa_lms_posted_on(); ?>
                    <?php aqsa_lms_posted_by(); ?>
                    <?php aqsa_lms_comment_count(); ?>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aqsa-lms' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div>

            <footer class="entry-footer">
                <?php aqsa_lms_entry_footer(); ?>
            </footer>

            <?php
            // Post navigation
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'aqsa-lms' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'aqsa-lms' ) . '</span> <span class="nav-title">%title</span>',
                )
            );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
        ?>
    </article>
</main>

<?php
get_footer();
