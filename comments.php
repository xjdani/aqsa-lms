<?php
/**
 * Comments Template
 *
 * @package Aqsa_LMS
 * @since 1.0.0
 */

if ( post_password_required() ) {
    return;
}
?>

<div class="comments-area" id="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf(
                    esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'aqsa-lms' ),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    esc_html( _n( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'aqsa-lms' ) ),
                    number_format_i18n( $comment_count ),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 50,
                )
            );
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'aqsa-lms' ); ?></p>
            <?php
        endif;

    endif;

    comment_form(
        array(
            'class_form'         => 'comment-form',
            'title_reply'        => __( 'Leave a Comment', 'aqsa-lms' ),
            'title_reply_to'     => __( 'Leave a Reply to %s', 'aqsa-lms' ),
            'cancel_reply_link'  => __( 'Cancel Reply', 'aqsa-lms' ),
            'label_submit'       => __( 'Post Comment', 'aqsa-lms' ),
        )
    );
    ?>
</div>
