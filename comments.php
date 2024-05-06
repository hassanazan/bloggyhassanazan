<?php
if (have_comments()) :
    ?>
    <div class="comments">
        <h2 class="comments-title">
            <?php
            printf(
                esc_html(_nx('One comment', '%1$s comments', get_comments_number(), 'comments title', 'bloggyhassanazan')),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

    </div>
<?php
endif;
