<?php get_header(); ?>

<div class="container py-5 px-2 bg-primary">
    <div class="row py-5 px-4">
        <div class="col-sm-6 text-center text-md-left">
            <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold"><?php esc_html_e('Blog Detail', 'bloggyhassanazan'); ?></h1>
        </div>
        <div class="col-sm-6 text-center text-md-right">
            <div class="d-inline-flex pt-2">
                <h4 class="m-0 text-white"><a class="text-white" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Home', 'bloggyhassanazan'); ?></a></h4>
                <h4 class="m-0 text-white px-2">/</h4>
                <h4 class="m-0 text-white"><?php esc_html_e('Blog Detail', 'bloggyhassanazan'); ?></h4>
            </div>
        </div>
    </div>
</div>

<?php
// Start the loop
while (have_posts()) : the_post();
?>
    <div class="container py-5 px-2 bg-white">
        <div class="row px-4">
            <div class="col-12">
                <img class="img-fluid mb-4" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                <h2 class="mb-3 font-weight-bold"><?php the_title(); ?></h2>
                <div class="d-flex">
                    <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i> <?php echo esc_html(get_the_date('d-M-Y')); ?></p>
                    <p class="mr-3 text-muted"><i class="fa fa-folder"></i> <?php the_category(', '); ?></p>
                    <p class="mr-3 text-muted"><i class="fa fa-comments"></i> <?php comments_number(); ?> <?php esc_html_e('Comments', 'bloggyhassanazan'); ?></p>
                </div>
                <?php the_content(); ?>

                <!-- Custom HTML Starts -->
 <h2 class="mb-3 font-weight-bold"><?php the_title(); ?></h2>
                <img class="w-50 float-left mr-4 mb-3" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="Featured Image">
                <?php the_content(); ?>
                <!-- Custom HTML Ends -->

                <?php
                // Display post tags
                $tags = get_the_tags();
                if ($tags) {
                    echo '<div class="mb-3">';
                    echo '<span class="font-weight-bold mr-2">' . esc_html__('Tags:', 'bloggyhassanazan') . '</span>';
                    foreach ($tags as $tag) {
                        $tag_link = get_tag_link($tag->term_id);
                        echo '<a href="' . esc_url($tag_link) . '" class="badge badge-secondary mr-2">' . esc_html($tag->name) . '</a>';
                    }
                    echo '</div>';
                }
                ?>

            </div>

            <div class="col-12 py-4">
                <?php
                // Check if there are previous or next posts
                $prev_post = get_previous_post();
                $next_post = get_next_post();

                if ($prev_post || $next_post) {
                    echo '<div class="btn-group btn-group-lg w-100">';

                    // Previous post button
                    if ($prev_post) {
                        echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '" class="btn btn-outline-primary"><i class="fa fa-angle-left mr-2"></i> ' . esc_html__('Previous', 'bloggyhassanazan') . '</a>';
                    }

                    // Next post button
                    if ($next_post) {
                        echo '<a href="' . esc_url(get_permalink($next_post->ID)) . '" class="btn btn-outline-primary">' . esc_html__('Next', 'bloggyhassanazan') . ' <i class="fa fa-angle-right ml-2"></i></a>';
                    }

                    echo '</div>';
                }
                ?>
            </div>

            <div class="col-12 py-4">
                <h3 class="mb-4 font-weight-bold"><?php comments_number(__('No Comments', 'bloggyhassanazan'), __('1 Comment', 'bloggyhassanazan'), __('% Comments', 'bloggyhassanazan')); ?></h3>
                <!-- Dynamic Comments -->
                <?php
                // Get comments for the current post
                $comments = get_comments(array(
                    'post_id' => get_the_ID(),
                    'status' => 'approve',
                ));

                // Loop through each comment
                foreach ($comments as $comment) :
                    //var_dump($comment);
                    if ($comment->comment_parent == 0) {
                        // This is a parent comment
                        ?>
                        <div class="media mb-4">
                            <img src="<?php echo esc_url(get_avatar_url($comment->comment_author_email)); ?>" alt="<?php esc_attr_e('Image', 'bloggyhassanazan'); ?>" class="mr-3 mt-1 rounded-circle" style="width:60px;">
                            <div class="media-body">
                                <h4><?php echo esc_html($comment->comment_author); ?> <small><i><?php echo esc_html(date('d M Y', strtotime($comment->comment_date))); ?></i></small></h4>
                                <p><?php echo esc_html($comment->comment_content); ?></p>
                                <button class="btn btn-sm btn-light" onclick="toggleReplyForm(<?php echo $comment->comment_ID; ?>)"><?php esc_html_e('Reply', 'bloggyhassanazan'); ?></button>
                                <div id="reply-form-<?php echo $comment->comment_ID; ?>" style="display: none;">
                                    <!-- Reply Form -->
                                    <?php
                                    comment_form(array(
                                        'title_reply' => __('Leave a Reply', 'bloggyhassanazan'),
                                        'title_reply_to' => __('Leave a Reply to %s', 'bloggyhassanazan'),
                                        'comment_notes_after' => '',
                                        'comment_field' => '<div class="form-group"><label for="comment-' . $comment->comment_ID . '">' . __('Comment', 'bloggyhassanazan') . '</label><textarea id="comment-' . $comment->comment_ID . '" name="comment" cols="45" rows="8" aria-required="true" class="form-control"></textarea></div>',
                                        'class_submit' => 'btn btn-primary',
                                        'submit_field' => '<p class="form-submit"><input name="submit" type="submit" id="submit" class="btn btn-primary" value="' . esc_attr__('Post Comment', 'bloggyhassanazan') . '"> <input type="hidden" name="comment_post_ID" value="' . $comment->comment_post_ID . '" id="comment_post_ID"> <input type="hidden" name="comment_parent" id="comment_parent" value="' . $comment->comment_ID . '"> </p>',

                                        //'comment_parent' => $comment->comment_ID // Set the parent comment ID
                                    ));
                                    ?>
                                    <!-- End Reply Form -->
                                </div>
                                <?php
                                // Display replies for this parent comment
                                foreach ($comments as $reply) {
                                    if ($reply->comment_parent == $comment->comment_ID) {
                                        ?>
                                        <div class="media mb-4 ml-5">
                                            <img src="<?php echo esc_url(get_avatar_url($reply->comment_author_email)); ?>" alt="<?php esc_attr_e('Image', 'bloggyhassanazan'); ?>" class="mr-3 mt-1 rounded-circle" style="width:60px;">
                                            <div class="media-body">
                                                <h4><?php echo esc_html($reply->comment_author); ?> <small><i><?php echo esc_html(date('d M Y', strtotime($reply->comment_date))); ?></i></small></h4>
                                                <p><?php echo esc_html($reply->comment_content); ?></p>
                                                <!-- Optionally add reply button for nested replies -->
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                endforeach;
                ?>
                <!-- Custom HTML Ends -->
                <script>
                    function toggleReplyForm(commentID) {
                        var replyForm = document.getElementById('reply-form-' + commentID);
                        if (replyForm.style.display === 'none') {
                            replyForm.style.display = 'block';
                        } else {
                            replyForm.style.display = 'none';
                        }
                    }
                </script>
            </div>

            <div class="col-12">
                <h3 class="mb-4 font-weight-bold"><?php esc_html_e('Leave a comment', 'bloggyhassanazan'); ?></h3>
                <!-- Reply Form -->
                <?php
                $commenter = wp_get_current_commenter();
                $req = get_option('require_name_email');
                $aria_req = ($req ? " aria-required='true'" : '');

                comment_form(array(
                    'title_reply' => __('Leave a Reply', 'bloggyhassanazan'),
                    'title_reply_to' => __('Leave a Reply to %s', 'bloggyhassanazan'),
                    'comment_notes_after' => '',
                    'class_submit' => 'btn btn-primary',
                    'fields' => array(
                        'author' =>
                            '<div class="form-group">' .
                            '<label for="author">' . __('Name', 'bloggyhassanazan') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
                            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' class="form-control" /></div>',
                        'email' =>
                            '<div class="form-group">' .
                            '<label for="email">' . __('Email', 'bloggyhassanazan') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
                            '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' class="form-control" /></div>',
                        'comment_parent' => '<input type="hidden" name="comment_parent" id="comment_parent" value="' . (isset($comment_parent) ? $comment_parent : 0) . '" />',
                    ),
                ));
                ?>
                <!-- End Reply Form -->
            </div>


        </div>
    </div>
<?php
endwhile;

// Start the loop.
while (have_posts()) : the_post();

    // Include the template part for the content.
    get_template_part('template-parts/content', get_post_format());

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;

// End the loop.
endwhile;
get_footer();
?>
