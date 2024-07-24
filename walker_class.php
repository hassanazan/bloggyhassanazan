<?php
class bloggyhassanazan_Custom_Comments_Walker extends Walker_Comment {
    // Override the start of each comment output
    public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $GLOBALS['comment'] = $comment;
        ?>
        <div id="comment-<?php comment_ID(); ?>" <?php comment_class('media mb-4'); ?>>
            <img class="mr-3 mt-1 rounded-circle" src="<?php echo esc_url(get_avatar_url($comment->comment_author_email)); ?>" alt="<?php esc_attr_e('Image', 'bloggyhassanazan'); ?>" style="width:60px;">
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
                    ));
                    ?>
                    <!-- End Reply Form -->
                </div>
               
            
        <?php
    }

    // Override the end of each comment output
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
        // Don't need to do anything here since we're not altering the end of each comment
        ?>
         </div><!-- media mb-4 -->
        </div><!-- media-body -->
        <?php
    }
}
?>
