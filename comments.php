<div class="col-12 py-4">
    <h3 class="mb-4 font-weight-bold"><?php comments_number(__('No Comments', 'bloggyhassanazan'), __('1 Comment', 'bloggyhassanazan'), __('% Comments', 'bloggyhassanazan')); ?></h3>
    <!-- Dynamic Comments -->
    <?php
    wp_list_comments(array(
        'style' => 'div',
        'avatar_size' => 60,
        'walker' => new bloggyhassanazan_Custom_Comments_Walker(), // Use your custom walker class
    ));
    ?>
    <!-- Custom HTML Ends -->
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